<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClimateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app','Climate Weight');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Climates'),];
?>
<div class="climate-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app','Create Climate Weight'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'ch_temp',
            // 'ch_dm',
            // 'temp_dm',
            'bobot_ch',
            'boobt_temp',
            'bobot_dm',
            'cr',
            'validation:boolean',
            // 'id_user',
            'date:date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
