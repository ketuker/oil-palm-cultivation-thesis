<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TutorialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tutorials';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tutorial-index">

    <p>
        <?= Html::a('Create Tutorial', ['tutorial/create'], ['class' => 'btn btn-success pull-right']) ?>
    </p><br>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'category.category',
            'title',
            'description',
            'image',
            // 'date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?><br>

    <p>
        <?= Html::a('Create Tutorial Category', ['tutorialcategory/create'], ['class' => 'btn btn-success pull-right']) ?>
    </p><br>

    <?= GridView::widget([
        'dataProvider' => $dataProvidercategory,
        'filterModel' => $searchModelcategory,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'category',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
