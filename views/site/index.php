<?php

/* @var $this yii\web\View */
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */


use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Airports trips';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <div class="col-lg-12">
                <h1><?= Html::encode($this->title) ?></h1>

                <form style="text-align: center; margin-bottom: 15px" action="" method="get">
                    <input name="query" class="form-control" type="text" value="<?= $query ?>">
                    <button style="margin-top: 15px" class="btn btn-md btn-block btn-success">search</button>
                </form>
            </div>
        </div>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns'      => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'corporate_id',
                'number',
                'user_id',
                'created_at',
                'updated_at',
                'coordination_at',
                'saved_at',
                'tag_le_id',
                'trip_purpose_id',
                'trip_purpose_parent_id',
                'trip_purpose_desc',
                'status',
            ],
        ]); ?>

    </div>
</div>
