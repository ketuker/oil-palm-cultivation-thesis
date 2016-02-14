<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Landpeat */

$this->title = Yii::t('app','Peatland Weight Questionnaire');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Peatland'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="landpeat-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
