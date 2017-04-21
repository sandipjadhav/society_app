<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RentalRecord */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rental-record-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'saas_id')->textInput() ?>

    <?= $form->field($model, 'flat_id')->textInput() ?>

    <?= $form->field($model, 'tenent_id')->textInput() ?>

    <?= $form->field($model, 'stay_start_on')->textInput() ?>

    <?= $form->field($model, 'left_on')->textInput() ?>

    <?= $form->field($model, 'contract_expiry_date')->textInput() ?>

    <?= $form->field($model, 'last_renewal')->textInput() ?>

    <?= $form->field($model, 'contract_duration')->textInput() ?>

    <?= $form->field($model, 'society_noc_date')->textInput() ?>

    <?= $form->field($model, 'society_noc_provider')->textInput() ?>

    <?= $form->field($model, 'police_verification_reference')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
