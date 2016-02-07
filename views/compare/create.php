<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Compare */

$this->title = 'Create Area of Interest';
$this->params['breadcrumbs'][] = ['label' => 'AOI', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compare-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
