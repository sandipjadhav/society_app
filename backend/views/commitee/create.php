<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Commitee */

$this->title = 'Create Commitee';
$this->params['breadcrumbs'][] = ['label' => 'Commitees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="commitee-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
