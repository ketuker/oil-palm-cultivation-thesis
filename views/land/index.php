<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LandSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lands';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="land-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Land', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'text_slope',
            'text_thick',
            'text_ripe',
            'slope_thick',
            // 'slope_ripe',
            // 'thick_ripe',
            // 'bobot_text',
            // 'bobot_slope',
            // 'bobot_thick',
            // 'bobot_ripe',
            // 'cr',
            // 'validation:boolean',
            // 'id_user',
            // 'date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
