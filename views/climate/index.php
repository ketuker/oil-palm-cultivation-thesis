<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClimateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Climates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="climate-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Climate', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ch_temp',
            'ch_dm',
            'temp_dm',
            'bobot_ch',
            // 'boobt_temp',
            // 'bobot_dm',
            // 'cr',
            // 'validation:boolean',
            // 'id_user',
            // 'date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
