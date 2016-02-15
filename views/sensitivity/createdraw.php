<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sensitivity */

$this->title = Yii::t('app','Create Area of Interest');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Area of Interest'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sensitivity-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_formdraw', [
        'model' => $model,
        'data_admin' => $data_admin,
        'bbox_geojson' => $bbox_geojson
    ]) ?>

</div>
