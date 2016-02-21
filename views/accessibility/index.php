<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccessibilitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app','Accessibilities Weight');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Accessibilities'),];
?>
<div class="accessibility-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app','Create Accessibility'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'road_mills',
            // 'road_town',
            // 'mills_town',
            'bobot_road',
            'bobot_mills',
            'bobot_town',
            'cr',
            'validation:boolean',
            // 'user.username',
            [
            'label' => 'Username',
            'attribute'=>'id',
            'value'=>'user.username',
            //'contentOptions'=>['style'=>'width: 120px;']
            ],
            'date:date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
