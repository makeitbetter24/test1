<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Trips $model */
/** @var yii\data\ActiveDataProvider $services */

$this->title = 'Update Trips: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Trips', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="trips-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'usersOptions' => [],
    ]) ?>

    <?= $this->render('elements/_services', ['model' => $model, 'services' => $services]);?>

</div>
