<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CommiteeMembers */

$this->title = 'Update Commitee Members: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Commitee Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="commitee-members-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
