<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LandpeatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Landpeats';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="landpeat-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Landpeat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'slope_thick',
            'slope_ripe',
            'thick_ripe',
            'bobot_slope',
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
