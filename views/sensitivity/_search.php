<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SensitivitySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sensitivity-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'dates') ?>

    <?= $form->field($model, 'id_user') ?>

    <?php // echo $form->field($model, 'data') ?>

    <?php // echo $form->field($model, 'st_area') ?>

    <?php // echo $form->field($model, 'data_rain') ?>

    <?php // echo $form->field($model, 'data_temp') ?>

    <?php // echo $form->field($model, 'data_dm') ?>

    <?php // echo $form->field($model, 'data_slope') ?>

    <?php // echo $form->field($model, 'data_text') ?>

    <?php // echo $form->field($model, 'data_elev') ?>

    <?php // echo $form->field($model, 'data_thick') ?>

    <?php // echo $form->field($model, 'data_ripe') ?>

    <?php // echo $form->field($model, 'data_road') ?>

    <?php // echo $form->field($model, 'data_mills') ?>

    <?php // echo $form->field($model, 'data_town') ?>

    <?php // echo $form->field($model, 'id_scenario') ?>

    <?php // echo $form->field($model, 'geom') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
