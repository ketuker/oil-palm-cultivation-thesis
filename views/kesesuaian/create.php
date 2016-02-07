<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Kesesuaian */

$this->title = 'Create Kesesuaian';
$this->params['breadcrumbs'][] = ['label' => 'Kesesuaians', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kesesuaian-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
