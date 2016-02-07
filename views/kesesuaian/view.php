<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Kesesuaian */

$this->title = $model->gid;
$this->params['breadcrumbs'][] = ['label' => 'Kesesuaians', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kesesuaian-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->gid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->gid], [
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
            'gid',
            'climate_temp',
            'climate_dm',
            'land_texture',
            'land_peat_thickness',
            'land_peat_ripening',
            'accessibility_distance_from_town',
            'constraint_kawasan_hutan',
            'constraint_sungai',
            'constraint_pemukiman',
            'constraint_pipib',
            'climate_ch',
            'accessibility_distance_from_road',
            'accessibility_distance_from_mills',
            'land_slope',
            'the_geom',
        ],
    ]) ?>

</div>
