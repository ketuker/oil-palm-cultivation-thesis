<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KesesuaianSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kesesuaian-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'gid') ?>

    <?= $form->field($model, 'climate_temp') ?>

    <?= $form->field($model, 'climate_dm') ?>

    <?= $form->field($model, 'land_texture') ?>

    <?= $form->field($model, 'land_peat_thickness') ?>

    <?php // echo $form->field($model, 'land_peat_ripening') ?>

    <?php // echo $form->field($model, 'accessibility_distance_from_town') ?>

    <?php // echo $form->field($model, 'constraint_kawasan_hutan') ?>

    <?php // echo $form->field($model, 'constraint_sungai') ?>

    <?php // echo $form->field($model, 'constraint_pemukiman') ?>

    <?php // echo $form->field($model, 'constraint_pipib') ?>

    <?php // echo $form->field($model, 'climate_ch') ?>

    <?php // echo $form->field($model, 'accessibility_distance_from_road') ?>

    <?php // echo $form->field($model, 'accessibility_distance_from_mills') ?>

    <?php // echo $form->field($model, 'land_slope') ?>

    <?php // echo $form->field($model, 'the_geom') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
