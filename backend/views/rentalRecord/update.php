<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RentalRecord */

$this->title = 'Update Rental Record: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Rental Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rental-record-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
