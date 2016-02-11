<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LandpeatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app','Peatland Weight');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Peatland'),];
?>
<div class="landpeat-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Landpeat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'slope_thick',
            // 'slope_ripe',
            // 'thick_ripe',
            'bobot_slope',
            'bobot_thick',
            'bobot_ripe',
            'cr',
            'validation:boolean',
            // 'id_user',
            'date:date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
