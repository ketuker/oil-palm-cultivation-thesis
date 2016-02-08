<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Landnpeat */

$this->title = Yii::t('app','Non Peatland Weight Questionnaire');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Non Peatland'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="landnpeat-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
