<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccessibilitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Accessibilities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accessibility-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Accessibility', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'road_mills',
            'road_town',
            'mills_town',
            'bobot_road',
            // 'bobot_mills',
            // 'bobot_town',
            // 'cr',
            // 'validation:boolean',
            // 'id_user',
            // 'dates',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
