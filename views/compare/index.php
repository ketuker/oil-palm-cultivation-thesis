<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CompareSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app','Area of Interest');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compare-index">

    <p>
        <?= Html::a(Yii::t('app','Create AOI'), ['createdraw'], ['class' => 'btn btn-primary pull-right']) ?>
        <?= Html::a(Yii::t('app','Upload AOI'), ['createupload'], ['class' => 'btn btn-info pull-right', 'style' => 'margin-right:5px;']) ?>
    </p><br><br>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title',
            'description',
            'dates:date',
            //'id_user',
            // 'data:ntext',
            // 'st_area',
            // 'geom',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
