<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Factors */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Factors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factors-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a(Yii::t('app','Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app','Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app','Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            // 'climate_land',
            // 'climate_accessibility',
            // 'land_accessibility',
            'bobot_climate',
            'bobot_land',
            'bobot_accessibility',
            'cr',
            'validation:boolean',
            // 'id_user',
            'date:date',
        ],
    ]) ?>

</div>
