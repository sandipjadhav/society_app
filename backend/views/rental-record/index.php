<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RentalRecordSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rental Records';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rental-record-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Rental Record', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'saas_id',
            'flat_id',
            'tenent_id',
            'stay_start_on',
            // 'left_on',
            // 'contract_expiry_date',
            // 'last_renewal',
            // 'contract_duration',
            // 'society_noc_date',
            // 'society_noc_provider',
            // 'police_verification_reference',
            // 'created_by',
            // 'created_at',
            // 'updated_by',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
