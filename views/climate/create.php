<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Climate */

$this->title = Yii::t('app','Climate Weight Questionnaire');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Climates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="climate-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
