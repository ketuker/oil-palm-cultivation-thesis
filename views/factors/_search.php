<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FactorsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="factors-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'climate_land') ?>

    <?= $form->field($model, 'climate_accessibility') ?>

    <?= $form->field($model, 'land_accessibility') ?>

    <?= $form->field($model, 'bobot_climate') ?>

    <?php // echo $form->field($model, 'bobot_land') ?>

    <?php // echo $form->field($model, 'bobot_accessibility') ?>

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
