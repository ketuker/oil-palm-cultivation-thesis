<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KesesuaianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kesesuaians';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kesesuaian-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Kesesuaian', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'gid',
            'climate_temp',
            'climate_dm',
            'land_texture',
            'land_peat_thickness',
            // 'land_peat_ripening',
            // 'accessibility_distance_from_town',
            // 'constraint_kawasan_hutan',
            // 'constraint_sungai',
            // 'constraint_pemukiman',
            // 'constraint_pipib',
            // 'climate_ch',
            // 'accessibility_distance_from_road',
            // 'accessibility_distance_from_mills',
            // 'land_slope',
            // 'the_geom',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
