<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model app\models\Society */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="society-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <?= $form->field($model, 'id')->hiddenInput()->label(false)  ?>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true])?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'reg_no')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Addresses</h4></div>
        <div class="panel-body">
            <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 1, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsAddress[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'addr_line1',
                    'addr_line2',
                    'landmark',
                    'city',
                    'state',
                    'pin',
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
                <?php foreach ($modelsAddress as $i => $modelAddress): ?>
                    <div class="item panel panel-default"><!-- widgetBody -->
                        <div class="panel-heading">
                            <h3 class="panel-title pull-left">Address</h3>
                            <div class="clearfix"></div>
                        </div>

                        <div class="panel-body">
                            <?php
                            // necessary for update action.
                            if (! $modelAddress->isNewRecord) {
                                echo Html::activeHiddenInput($modelAddress, "[{$i}]id");
                            }
                            ?>

                            <div class="row">
                                <div class="col-sm-6">
                                    <?= $form->field($modelAddress, "[{$i}]addr_line1")->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-sm-6">
                                    <?= $form->field($modelAddress, "[{$i}]addr_line2")->textInput(['maxlength' => true]) ?>
                                </div>
                            </div><!-- .row -->
                            <div class="row">

                                <div class="col-sm-4">
                                    <?= $form->field($modelAddress, "[{$i}]landmark")->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($modelAddress, "[{$i}]city")->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($modelAddress, "[{$i}]state")->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($modelAddress, "[{$i}]country")->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($modelAddress, "[{$i}]phone1")->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($modelAddress, "[{$i}]pin")->textInput(['maxlength' => true]) ?>
                                </div>
                            </div><!-- .row -->

                        </div>


                    </div>
                <?php endforeach; ?>

            </div>

            <?php DynamicFormWidget::end(); ?>

            <div class="container-items">
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Builder</h3>
                        <div class="clearfix"></div>
                    </div>

                    <div class="panel-body">
                    </div>
            </div>

        </div>

    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
<?php
$script = '$(".dynamicform_wrapper").on("beforeInsert", function(e, item) {
    console.log("beforeInsert");
});

$(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    console.log("afterInsert");
});

$(".dynamicform_wrapper").on("beforeDelete", function(e, item) {
    if (! confirm("Are you sure you want to delete this item?")) {
        return false;
    }
    return true;
});

$(".dynamicform_wrapper").on("afterDelete", function(e) {
    console.log("Deleted item!");
});

$(".dynamicform_wrapper").on("limitReached", function(e, item) {
    alert("Limit reached");
});';

$this->registerJs($script);

?>