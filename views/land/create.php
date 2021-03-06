<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Land */

$this->title = 'Land Weight Questionnaire';
$this->params['breadcrumbs'][] = ['label' => 'Lands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="land-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
