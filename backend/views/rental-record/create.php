<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RentalRecord */

$this->title = 'Create Rental Record';
$this->params['breadcrumbs'][] = ['label' => 'Rental Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rental-record-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
