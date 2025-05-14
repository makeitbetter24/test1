<?php

/** @var yii\web\View $this */
/** @var app\models\Trips $model */
/** @var \yii\bootstrap4\ActiveForm $form */

?>

<p><?= $model->isNewRecord ? '' : "#{$model->id}";?></p>

<?= $form->field($model, 'name')->textInput() ?>
