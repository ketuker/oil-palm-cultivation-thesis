<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Landnpeat */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Non Peatland'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="landnpeat-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            // 'slope_text',
            // 'slope_elev',
            // 'text_elev',
            'bobot_slope',
            'bobot_text',
            'bobot_elev',
            'cr',
            'validation:boolean',
            'id_user',
            'date:date',
        ],
    ]) ?>

</div>
