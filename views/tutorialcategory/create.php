<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tutorialcategory */

$this->title = 'Create Tutorial Category';
$this->params['breadcrumbs'][] = ['label' => 'Tutorial', 'url' => ['tutorial/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tutorialcategory-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
