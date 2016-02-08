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
            // 'slope_text',
            // 'slope_elev',
            // 'text_elev',
            // 'bobot_slopenp',
            // 'bobot_text',
            // 'bobot_elev',
            // 'cr_landnpeat',
            // 'validation_landnpeat:boolean',
            // 'slope_thick',
            // 'slope_ripe',
            // 'thick_ripe',
            // 'bobot_slopep',
            // 'bobot_thick',
            // 'bobot_ripe',
            // 'cr_landpeat',
            // 'validation_landpeat:boolean',
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
            // 'validation_factors:boolean',
            // 'id_user',
            // 'dates',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
