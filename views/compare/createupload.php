<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Compare */

$this->title = Yii::t('app','Create Area of Interest');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Area of Interest'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compare-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_formupload', [
        'model' => $model,
    ]) ?>

</div>
