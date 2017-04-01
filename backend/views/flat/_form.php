<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Flat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="flat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'saas_id')->textInput() ?>

    <?= $form->field($model, 'flat_number')->textInput() ?>

    <?= $form->field($model, 'building_name')->textInput() ?>

    <?= $form->field($model, 'is_rented')->textInput() ?>

    <?= $form->field($model, 'carpet_area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'builtup_area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
