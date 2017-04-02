<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Society */

$this->title = 'Create Society';
$this->params['breadcrumbs'][] = ['label' => 'Societies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="society-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>