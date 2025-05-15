<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Services $model */
/** @var array $typesOptions */

$this->title = 'Update Services: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Trips', 'url' => ['trips/index']];
$this->params['breadcrumbs'][] = ['label' => $model->trip->name, 'url' => ['trips/view', 'id' => $model->trip_id]];
$this->params['breadcrumbs'][] = 'Update Service';
?>
<div class="services-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'typesOptions' => $typesOptions,
    ]) ?>

</div>
