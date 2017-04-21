<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Address */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="address-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'saas_id')->textInput() ?>

    <?= $form->field($model, 'addr_line1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'addr_line2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'landmark')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lattitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'langitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput() ?>

    <?= $form->field($model, 'state')->textInput() ?>

    <?= $form->field($model, 'country')->textInput() ?>

    <?= $form->field($model, 'pin')->textInput() ?>

    <?= $form->field($model, 'phone1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
