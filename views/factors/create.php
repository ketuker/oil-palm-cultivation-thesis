<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Factors */

$this->title = Yii::t('app','Factors Weight Questionnaire');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Factors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factors-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
