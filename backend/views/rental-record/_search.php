<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RentalRecordSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rental-record-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'saas_id') ?>

    <?= $form->field($model, 'flat_id') ?>

    <?= $form->field($model, 'tenent_id') ?>

    <?= $form->field($model, 'stay_start_on') ?>

    <?php // echo $form->field($model, 'left_on') ?>

    <?php // echo $form->field($model, 'contract_expiry_date') ?>

    <?php // echo $form->field($model, 'last_renewal') ?>

    <?php // echo $form->field($model, 'contract_duration') ?>

    <?php // echo $form->field($model, 'society_noc_date') ?>

    <?php // echo $form->field($model, 'society_noc_provider') ?>

    <?php // echo $form->field($model, 'police_verification_reference') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
