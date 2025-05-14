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

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?= \yii\bootstrap4\Tabs::widget([
        'items' => [
            [
                'label' => 'Details',
                'content' => $this->render('elements/_details', ['model' => $model, 'form' => $form]),
                'active' => true
            ],
            [
                'label' => 'Users',
                'content' => $this->render('elements/_users', ['model' => $model, 'form' => $form, 'usersOptions' => $usersOptions]),
            ],
            [
                'label' => 'Services',
                'content' => $this->render('elements/_services', ['model' => $model]),
            ],
        ],
    ]);?>

    <?php ActiveForm::end(); ?>

</div>
