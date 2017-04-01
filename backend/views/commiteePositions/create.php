<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CommiteePositions */

$this->title = 'Create Commitee Positions';
$this->params['breadcrumbs'][] = ['label' => 'Commitee Positions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="commitee-positions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
