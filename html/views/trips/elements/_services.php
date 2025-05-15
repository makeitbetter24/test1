<?php

use yii\helpers\Url;
use yii\grid\ActionColumn;
use app\models\Services;
use yii\bootstrap4\Html;

/** @var yii\web\View $this */
/** @var app\models\Trips $model */
/** @var yii\data\ActiveDataProvider $services */

?>

<h4>
    <?= Html::a('Add New', ['services/create', 'trip' => $model->id], ['class' => 'btn btn-success float-right']) ?>
    Services
</h4>

<?= \yii\grid\GridView::widget([
    'dataProvider' => $services,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'title',
        'start_time',
        'end_time',
        'status',
        [
            'class' => ActionColumn::class,
            'urlCreator' => function ($action, Services $service, $key, $index, $column) {
                return Url::toRoute(["services/$action", 'id' => $service->id]);
            },
            'template' => '{update}',
        ],
        [
            'class' => ActionColumn::class,
            'urlCreator' => function ($action, Services $service, $key, $index, $column) {
                return Url::toRoute(["services/$action", 'id' => $service->id]);
            },
            'template' => '{delete}',
        ],
    ],
]);?>

