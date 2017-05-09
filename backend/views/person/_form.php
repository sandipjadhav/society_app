<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Person */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="person-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-3">
            <?= $form->field($model, 'title')->dropDownList(array(""=>"Select","mr"=>"Mr.", "mrs"=>"Mrs.", "miss"=>"Miss."))?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true])?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'gender')->dropDownList(array(""=>"Select","Female"=>"Female","Male"=>"Male","Others"=>"Others")) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?= $form->field($model, 'photo')->fileInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'adhar_card')->textInput(['maxlength' => true])?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'pan_card')->textInput(['maxlength' => true])?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'education')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="container-items">
        <div class="item panel panel-default"><!-- widgetBody -->
            <div class="panel-heading">
                <div class="row">
                    <div class="col-sm-6">
                        <?= $form->field($model, "address_verified")->checkbox() ?>
                    </div>
                </div>
                <h3 class="panel-title pull-left">Permanent Address</h3>
                <div class="clearfix"></div>


            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6">
                        <?= $form->field($address1, "[1]addr_line1")->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-sm-6">
                        <?= $form->field($address1, "[1]addr_line2")->textInput(['maxlength' => true]) ?>
                    </div>
                </div><!-- .row -->
                <div class="row">

                    <div class="col-sm-4">
                        <?= $form->field($address1, "[1]landmark")->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-sm-4">
                        <?= $form->field($address1, "[1]city")->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-sm-4">
                        <?= $form->field($address1, "[1]state")->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-sm-4">
                        <?= $form->field($address1, "[1]country")->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-sm-4">
                        <?= $form->field($address1, "[1]phone1")->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-sm-4">
                        <?= $form->field($address1, "[1]pin")->textInput(['maxlength' => true]) ?>
                    </div>
                </div><!-- .row -->

            </div>
        </div>
        <div class="item panel panel-default"><!-- widgetBody -->
            <div class="panel-heading">
                <h3 class="panel-title pull-left">Temporary Address</h3>
                <div class="clearfix"></div>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6">
                        <?= $form->field($address2, "[2]addr_line1")->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-sm-6">
                        <?= $form->field($address2, "[2]addr_line2")->textInput(['maxlength' => true]) ?>
                    </div>
                </div><!-- .row -->
                <div class="row">

                    <div class="col-sm-4">
                        <?= $form->field($address2, "[2]landmark")->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-sm-4">
                        <?= $form->field($address2, "[2]city")->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-sm-4">
                        <?= $form->field($address2, "[2]state")->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-sm-4">
                        <?= $form->field($address2, "[2]country")->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-sm-4">
                        <?= $form->field($address2, "[2]phone1")->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-sm-4">
                        <?= $form->field($address2, "[2]pin")->textInput(['maxlength' => true]) ?>
                    </div>
                </div><!-- .row -->

            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
