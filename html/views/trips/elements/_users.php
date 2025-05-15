<?php

/** @var yii\web\View $this */
/** @var app\models\Trips $model */
/** @var yii\widgets\ActiveForm $form */
/** @var array $usersOptions */

?>

<h4>Users</h4>

<?php if ($model->isNewRecord): ?>

    <?= $form->field($model, 'users')->dropDownList($usersOptions, ['multiple' => true, 'selected' => true]) ?>

<?php else: ?>

<ul>
    <?php foreach ($model->users as $user): ?>
    <li>
        <?= \yii\bootstrap4\Html::a($user->name, ['users/view', 'id' => $user->id]);?>
    </li>
    <?php endforeach;?>
</ul>

<?php endif;?>
