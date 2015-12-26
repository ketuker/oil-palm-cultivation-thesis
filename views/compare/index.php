<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CompareSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Compares';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compare-index">

    <p>
        <?= Html::a('Create Compare Draw', ['createdraw'], ['class' => 'btn btn-primary pull-right']) ?>
        <?= Html::a('Create Compare Upload', ['createupload'], ['class' => 'btn btn-info pull-right', 'style' => 'margin-right:5px;']) ?>
    </p><br><br>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title',
            'description',
            'dates:datetime',
            //'id_user',
            // 'data:ntext',
            // 'st_area',
            // 'geom',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
