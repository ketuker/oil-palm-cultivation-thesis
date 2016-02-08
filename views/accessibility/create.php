<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Accessibility */

$this->title = 'Accessibility Weight Questionnaire';
$this->params['breadcrumbs'][] = ['label' => 'Accessibilities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accessibility-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
