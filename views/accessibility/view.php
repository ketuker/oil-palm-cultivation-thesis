<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Accessibility */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Accessibilities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accessibility-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'road_mills',
            'road_town',
            'mills_town',
            'bobot_road',
            'bobot_mills',
            'bobot_town',
            'cr',
            'validation:boolean',
            'id_user',
            'date',
        ],
    ]) ?>

</div>
