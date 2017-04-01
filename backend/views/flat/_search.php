<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FlatSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="flat-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'saas_id') ?>

    <?= $form->field($model, 'flat_number') ?>

    <?= $form->field($model, 'building_name') ?>

    <?= $form->field($model, 'is_rented') ?>

    <?php // echo $form->field($model, 'carpet_area') ?>

    <?php // echo $form->field($model, 'builtup_area') ?>

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
