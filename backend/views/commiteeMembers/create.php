<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CommiteeMembers */

$this->title = 'Create Commitee Members';
$this->params['breadcrumbs'][] = ['label' => 'Commitee Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="commitee-members-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
