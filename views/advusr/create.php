<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Advusr */

$this->title = 'Create Advusr';
$this->params['breadcrumbs'][] = ['label' => 'Advusrs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advusr-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
