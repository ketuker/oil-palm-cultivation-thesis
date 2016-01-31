<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kesesuaian */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kesesuaian-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'climate_temp')->textInput() ?>

    <?= $form->field($model, 'climate_dm')->textInput() ?>

    <?= $form->field($model, 'land_texture')->textInput() ?>

    <?= $form->field($model, 'land_peat_thickness')->textInput() ?>

    <?= $form->field($model, 'land_peat_ripening')->textInput() ?>

    <?= $form->field($model, 'accessibility_distance_from_town')->textInput() ?>

    <?= $form->field($model, 'constraint_kawasan_hutan')->textInput() ?>

    <?= $form->field($model, 'constraint_sungai')->textInput() ?>

    <?= $form->field($model, 'constraint_pemukiman')->textInput() ?>

    <?= $form->field($model, 'constraint_pipib')->textInput() ?>

    <?= $form->field($model, 'climate_ch')->textInput() ?>

    <?= $form->field($model, 'accessibility_distance_from_road')->textInput() ?>

    <?= $form->field($model, 'accessibility_distance_from_mills')->textInput() ?>

    <?= $form->field($model, 'land_slope')->textInput() ?>

    <?= $form->field($model, 'the_geom')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
