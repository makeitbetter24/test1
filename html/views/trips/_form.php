<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Trips $model */
/** @var yii\widgets\ActiveForm $form */
/** @var array $usersOptions */
?>

<div class="trips-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $this->render('elements/_details', ['model' => $model, 'form' => $form]);?>

    <?= $this->render('elements/_users', ['model' => $model, 'form' => $form, 'usersOptions' => $usersOptions]);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
