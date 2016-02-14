<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LandpeatSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="landpeat-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'slope_thick') ?>

    <?= $form->field($model, 'slope_ripe') ?>

    <?= $form->field($model, 'thick_ripe') ?>

    <?= $form->field($model, 'bobot_slope') ?>

    <?php // echo $form->field($model, 'bobot_thick') ?>

    <?php // echo $form->field($model, 'bobot_ripe') ?>

    <?php // echo $form->field($model, 'cr') ?>

    <?php // echo $form->field($model, 'validation')->checkbox() ?>

    <?php // echo $form->field($model, 'id_user') ?>

    <?php // echo $form->field($model, 'date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
