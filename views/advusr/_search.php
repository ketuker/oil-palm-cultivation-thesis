<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AdvusrSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advusr-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'skenario') ?>

    <?= $form->field($model, 'ch_temp') ?>

    <?= $form->field($model, 'ch_dm') ?>

    <?= $form->field($model, 'temp_dm') ?>

    <?php // echo $form->field($model, 'bobot_ch') ?>

    <?php // echo $form->field($model, 'bobot_temp') ?>

    <?php // echo $form->field($model, 'bobot_dm') ?>

    <?php // echo $form->field($model, 'cr_climate') ?>

    <?php // echo $form->field($model, 'validation_climate')->checkbox() ?>

    <?php // echo $form->field($model, 'slope_text') ?>

    <?php // echo $form->field($model, 'slope_elev') ?>

    <?php // echo $form->field($model, 'text_elev') ?>

    <?php // echo $form->field($model, 'bobot_slopenp') ?>

    <?php // echo $form->field($model, 'bobot_text') ?>

    <?php // echo $form->field($model, 'bobot_elev') ?>

    <?php // echo $form->field($model, 'cr_landnpeat') ?>

    <?php // echo $form->field($model, 'validation_landnpeat')->checkbox() ?>

    <?php // echo $form->field($model, 'slope_thick') ?>

    <?php // echo $form->field($model, 'slope_ripe') ?>

    <?php // echo $form->field($model, 'thick_ripe') ?>

    <?php // echo $form->field($model, 'bobot_slopep') ?>

    <?php // echo $form->field($model, 'bobot_thick') ?>

    <?php // echo $form->field($model, 'bobot_ripe') ?>

    <?php // echo $form->field($model, 'cr_landpeat') ?>

    <?php // echo $form->field($model, 'validation_landpeat')->checkbox() ?>

    <?php // echo $form->field($model, 'road_mills') ?>

    <?php // echo $form->field($model, 'road_town') ?>

    <?php // echo $form->field($model, 'mills_town') ?>

    <?php // echo $form->field($model, 'bobot_road') ?>

    <?php // echo $form->field($model, 'bobot_mills') ?>

    <?php // echo $form->field($model, 'bobot_town') ?>

    <?php // echo $form->field($model, 'cr_accessibility') ?>

    <?php // echo $form->field($model, 'validation_accessibility')->checkbox() ?>

    <?php // echo $form->field($model, 'climate_land') ?>

    <?php // echo $form->field($model, 'climate_accessibility') ?>

    <?php // echo $form->field($model, 'land_accessibility') ?>

    <?php // echo $form->field($model, 'bobot_climate') ?>

    <?php // echo $form->field($model, 'bobot_land') ?>

    <?php // echo $form->field($model, 'bobot_accessibility') ?>

    <?php // echo $form->field($model, 'cr_factors') ?>

    <?php // echo $form->field($model, 'validation_factors')->checkbox() ?>

    <?php // echo $form->field($model, 'id_user') ?>

    <?php // echo $form->field($model, 'dates') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
