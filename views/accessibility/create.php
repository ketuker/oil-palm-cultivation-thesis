<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Accessibility */

$this->title = 'Accessibility Weight Questionnaire';
$this->params['breadcrumbs'][] = ['label' => 'Accessibilities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accessibility-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
