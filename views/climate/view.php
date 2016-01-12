<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Climate */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Climates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="climate-view">

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
            'ch_temp',
            'ch_dm',
            'temp_dm',
            'bobot_ch',
            'boobt_temp',
            'bobot_dm',
            'cr',
            'validation:boolean',
            'id_user',
            'date',
        ],
    ]) ?>

</div>
