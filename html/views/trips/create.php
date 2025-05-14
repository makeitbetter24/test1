<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Trips $model */

$this->title = 'Create Trips';
$this->params['breadcrumbs'][] = ['label' => 'Trips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trips-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
