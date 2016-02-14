<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClimateSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="climate-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ch_temp') ?>

    <?= $form->field($model, 'ch_dm') ?>

    <?= $form->field($model, 'temp_dm') ?>

    <?= $form->field($model, 'bobot_ch') ?>

    <?php // echo $form->field($model, 'boobt_temp') ?>

    <?php // echo $form->field($model, 'bobot_dm') ?>

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
