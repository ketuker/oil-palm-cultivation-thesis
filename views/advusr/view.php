<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Advusr */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Sensitivity Analysis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advusr-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'skenario',
            // 'ch_temp',
            // 'ch_dm',
            // 'temp_dm',
            'bobot_ch',
            'bobot_temp',
            'bobot_dm',
            'cr_climate',
            // 'validation_climate:boolean',
            // 'slope_text',
            // 'slope_elev',
            // 'text_elev',
            'bobot_slopenp',
            'bobot_text',
            'bobot_elev',
            'cr_landnpeat',
            // 'validation_landnpeat:boolean',
            // 'slope_thick',
            // 'slope_ripe',
            // 'thick_ripe',
            'bobot_slopep',
            'bobot_thick',
            'bobot_ripe',
            'cr_landpeat',
            // 'validation_landpeat:boolean',
            // 'road_mills',
            // 'road_town',
            // 'mills_town',
            'bobot_road',
            'bobot_mills',
            'bobot_town',
            'cr_accessibility',
            // 'validation_accessibility:boolean',
            // 'climate_land',
            // 'climate_accessibility',
            // 'land_accessibility',
            'bobot_climate',
            'bobot_land',
            'bobot_accessibility',
            'cr_factors',
            // 'validation_factors:boolean',
            // 'id_user',
            'date:date',
        ],
    ]) ?>

</div>
