<?php

namespace app\controllers;

use app\models\Trip;
use app\models\TripService;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {

        $query = 'Домодедово, Москва';

        if (\Yii::$app->request->isGet) {
            $getQuery = \Yii::$app->request->get('query');

            if (!empty($getQuery)) {
                $query = $getQuery;
            }
        }

        $data = Trip::find()
            ->joinWith('tripServices.flightSegment')
            ->leftJoin("nemo_guide_etalon.airport_name AS airport_name",
                'airport_name.airport_id = flight_segment.depAirportId'
            )
            ->where([
                'trip.corporate_id'       => Trip::CURRENT_CORPORATE_ID,
                'trip_service.service_id' => TripService::CURRENT_TRIP_SERVICE,
            ])
            ->andFilterWhere(['like', 'airport_name.value', "$query"]);

        $dataProvider = new ActiveDataProvider([
            'query' => $data,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'query'       => $query
        ]);
    }
}
