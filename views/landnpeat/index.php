<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LandnpeatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Landnpeats';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="landnpeat-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Landnpeat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'slope_text',
            'slope_elev',
            'text_elev',
            'bobot_slope',
            // 'bobot_text',
            // 'bobot_elev',
            // 'cr',
            // 'validation:boolean',
            // 'id_user',
            // 'date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
