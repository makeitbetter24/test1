<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Services;

/** @var yii\web\View $this */
/** @var app\models\Services $model */
/** @var yii\widgets\ActiveForm $form */
/** @var array $typesOptions */
?>

<div class="services-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'service_type_id')->dropDownList($typesOptions) ?>

    <?= $form->field($model, 'trip_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start_time')
        ->widget(\yii\jui\DatePicker::class, ['dateFormat' => 'yyyy-MM-dd']) ?>

    <?= $form->field($model, 'end_time')
        ->widget(\yii\jui\DatePicker::class, ['dateFormat' => 'yyyy-MM-dd']) ?>

    <?= $form->field($model, 'status')->dropDownList([
            Services::STATUS_DRAFT => 'Draft',
            Services::STATUS_ACTIVE => 'Active',
            Services::STATUS_CANCEL => 'Cancel',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
