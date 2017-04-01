<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PersonSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="person-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'saas_id') ?>

    <?= $form->field($model, 'first_name') ?>

    <?= $form->field($model, 'surname') ?>

    <?= $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'photo') ?>

    <?php // echo $form->field($model, 'adhar_card') ?>

    <?php // echo $form->field($model, 'pan_card') ?>

    <?php // echo $form->field($model, 'education') ?>

    <?php // echo $form->field($model, 'occupation') ?>

    <?php // echo $form->field($model, 'address1_id') ?>

    <?php // echo $form->field($model, 'address2_id') ?>

    <?php // echo $form->field($model, 'address_verified') ?>

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
