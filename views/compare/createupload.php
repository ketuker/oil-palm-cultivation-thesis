<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Compare */

$this->title = 'Create Compare';
$this->params['breadcrumbs'][] = ['label' => 'Compares', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compare-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formupload', [
        'model' => $model,
    ]) ?>

</div>
