<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AdvusrSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Advusrs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advusr-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Advusr', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'skenario',
            'ch_temp',
            'ch_dm',
            'temp_dm',
            // 'bobot_ch',
            // 'bobot_temp',
            // 'bobot_dm',
            // 'cr_climate',
            // 'validation_climate:boolean',
            // 'text_slope',
            // 'text_thick',
            // 'text_ripe',
            // 'slope_thick',
            // 'slope_ripe',
            // 'thick_ripe',
            // 'bobot_text',
            // 'bobot_slope',
            // 'bobot_thick',
            // 'bobot_ripe',
            // 'cr_land',
            // 'validation_land:boolean',
            // 'road_mills',
            // 'road_town',
            // 'mills_town',
            // 'bobot_road',
            // 'bobot_mills',
            // 'bobot_town',
            // 'cr_accessibility',
            // 'validation_accessibility:boolean',
            // 'climate_land',
            // 'climate_accessibility',
            // 'land_accessibility',
            // 'bobot_climate',
            // 'bobot_land',
            // 'bobot_accessibility',
            // 'cr_factors',
            // 'validation:boolean',
            // 'id_user',
            // 'date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
