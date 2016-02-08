<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Advusr */

$this->title = Yii::t('app','Create Scenario');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Sensitivity Analysis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advusr-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
