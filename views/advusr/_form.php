<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\slider\Slider;

/* @var $this yii\web\View */
/* @var $model app\models\Advusr */
/* @var $form yii\widgets\ActiveForm */
?>
<style type="text/css">
.slider.slider-horizontal {
  width: 100%; /*changed*/
  height: 30px;
}
</style>
<div class="advusr-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'skenario')->textInput() ?>

<!-- Sub Factor Climate -->

   <?= $form->field($model, 'ch_temp')->HiddenInput()->label('') ?>



    <?= '<div class="col-md-1">' ?>
    <?= '<b class="badge" style="background-color:#2dc9ff"> <h6 style="font-weight: bold;">Temperature</h6> </b> </div>'?>
    <?= '<div class="col-md-10">'.Slider::widget([
        'name'=>'CH_TEMP',
        'value'=>10,
        'handleColor'=>Slider::TYPE_INFO,
        'pluginEvents' => [
            'slideStop' => "function(val) { document.getElementById('climate-ch_temp').value = ConvertNumber(val.value); }",
        ],
        'pluginOptions'=>[
            // 'handle'=>'square',
            'min'=>2,
            'max'=>18,
            'step'=>1,
            'tooltip_position'=> 'top',
            'formatter'=>new yii\web\JsExpression("function(val) { return ConvertString(val); }")
        ]
    ]) . '</div> <div class="col-md-1"> <b class="badge" style="background-color:#2dc9ff"> <h6 style="font-weight: bold;">Rainfall</h6> </b> '; ?>
    <?= '</div>' ?>
    

    <?= '</br> </br> </br> </br>' ?>

    <?= $form->field($model, 'ch_dm')->HiddenInput()->label('') ?>


    <?= '<div class="col-md-1">' ?>
    <?= '<b class="badge" style="background-color:#2dc9ff"> <h6 style="font-weight: bold;">Dry Month</h6> </b> </div>'?>
    <?= '<div class="col-md-10">'.Slider::widget([
        'name'=>'CH_DM',
        'value'=>10,
        'handleColor'=>Slider::TYPE_INFO,
        'pluginEvents' => [
            'slideStop' => "function(val) { document.getElementById('climate-ch_dm').value = ConvertNumber(val.value); }",
        ],
        'pluginOptions'=>[
            'min'=>2,
            'max'=>18,
            'step'=>1,
            'tooltip_position'=> 'top',
            // 'tooltip'=>'always',
            'formatter'=>new yii\web\JsExpression("function(val) { return ConvertString(val); }")
        ]
    ]) . '</div> <div class="col-md-1"> <b class="badge" style="background-color:#2dc9ff"> <h6 style="font-weight: bold;">Rainfall</h6> </b> '; ?>
    <?= '</div>' ?>
    

    <?= '</br> </br> </br> </br>' ?>

    <?= $form->field($model, 'temp_dm')->HiddenInput()->label('') ?>


    <?= '<div class="col-md-1">' ?>
    <?= '<b class="badge" style="background-color:#2dc9ff"> <h6 style="font-weight: bold;">Dry Month</h6> </b> </div>'?>
    <?= '<div class="col-md-10">'.Slider::widget([
        'name'=>'TEMP_DM',
        'value'=>10,
        'handleColor'=>Slider::TYPE_INFO,
        'pluginEvents' => [
            'slideStop' => "function(val) { document.getElementById('climate-temp_dm').value = ConvertNumber(val.value); }",
        ],
        'pluginOptions'=>[
            'min'=>2,
            'max'=>18,
            'step'=>1,
            // 'tooltip'=>'always',
            'formatter'=>new yii\web\JsExpression("function(val) { return ConvertString(val); }")
        ]
    ]) . '</div> <div class="col-md-1"> <b class="badge" style="background-color:#2dc9ff"> <h6 style="font-weight: bold;">Temperature</h6> </b> '; ?>
    <?= '</div>' ?>
    <?= '</br> </br> </br> </br>' ?>




<!--  SubFactors Land -->
    <?= $form->field($model, 'text_slope')->HiddenInput()->label('') ?>

    <?= '<div class="col-md-1">' ?>
    <?= '<b class="badge" style="background-color:#ff7e7e"> <h6 style="font-weight: bold;">Slope</h6> </b> </div>'?>
    <?= '<div class="col-md-10">'.Slider::widget([
        'name'=>'text_slope',
        'value'=>10,
        'handleColor'=>Slider::TYPE_DANGER,
        'pluginEvents' => [
            'slideStop' => "function(val) { document.getElementById('land-text_slope').value = ConvertNumber(val.value); }",
        ],
        'pluginOptions'=>[
            'min'=>2,
            'max'=>18,
            'step'=>1,
            // 'tooltip'=>'always',
            'formatter'=>new yii\web\JsExpression("function(val) { return ConvertString(val); }")
        ]
    ]) . '</div> <div class="col-md-1"> <b class="badge" style="background-color:#ff7e7e"> <h6 style="font-weight: bold;">Soil Texture</h6> </b> '; ?>
    <?= '</div>' ?>
    
    <?= $form->field($model, 'text_thick')->HiddenInput()->label('') ?>


    <?= '</br> </br>' ?>


    <?= '<div class="col-md-1">' ?>
    <?= '<b class="badge" style="background-color:#ff7e7e"> <p style="font-weight: bold;margin: 0 0 0 ;">Peat</p> </br> <p style="font-weight: bold;margin: 0 0 0 ;">Thickness</p> </b> </div>'?>
    <?= '<div class="col-md-10">'.Slider::widget([
        'name'=>'text_thick',
        'value'=>10,
        'handleColor'=>Slider::TYPE_DANGER,
        'pluginEvents' => [
            'slideStop' => "function(val) { document.getElementById('land-text_thick').value = ConvertNumber(val.value); }",
        ],
        'pluginOptions'=>[
            'min'=>2,
            'max'=>18,
            'step'=>1,
            // 'tooltip'=>'always',
            'formatter'=>new yii\web\JsExpression("function(val) { return ConvertString(val); }")
        ]
    ]) . '</div> <div class="col-md-1"> <b class="badge" style="background-color:#ff7e7e"> <h6 style="font-weight: bold;">Soil Texture</h6> </b> '; ?>
    <?= '</div>' ?>

    <?= $form->field($model, 'text_ripe')->HiddenInput()->label('') ?>


    <?= '</br> </br>' ?>
    

    <?= '<div class="col-md-1">' ?>
    <?= '<b class="badge" style="background-color:#ff7e7e"> <h6 style="font-weight: bold;">Peat Ripening</h6> </b> </div>'?>
    <?= '<div class="col-md-10">'.Slider::widget([
        'name'=>'text_ripe',
        'value'=>10,
        'handleColor'=>Slider::TYPE_DANGER,
        'pluginEvents' => [
            'slideStop' => "function(val) { document.getElementById('land-text_ripe').value = ConvertNumber(val.value); }",
        ],
        'pluginOptions'=>[
            'min'=>2,
            'max'=>18,
            'step'=>1,
            // 'tooltip'=>'always',
            'formatter'=>new yii\web\JsExpression("function(val) { return ConvertString(val); }")
        ]
    ]) . '</div> <div class="col-md-1"> <b class="badge" style="background-color:#ff7e7e"> <h6 style="font-weight: bold;">Soil Texture</h6> </b> '; ?>
    <?= '</div>' ?>

    <?= $form->field($model, 'slope_thick')->HiddenInput()->label('') ?>


    <?= '</br> </br>' ?>


    <?= '<div class="col-md-1">' ?>
    <?= '<b class="badge" style="background-color:#ff7e7e"> <p style="font-weight: bold;margin: 0 0 0 ;">Peat</p> </br> <p style="font-weight: bold;margin: 0 0 0 ;">Thickness</p> </b> </div>'?>
    <?= '<div class="col-md-10">'.Slider::widget([
        'name'=>'slope_thick',
        'value'=>10,
        'handleColor'=>Slider::TYPE_DANGER,
        'pluginEvents' => [
            'slideStop' => "function(val) { document.getElementById('land-slope_thick').value = ConvertNumber(val.value); }",
        ],
        'pluginOptions'=>[
            'min'=>2,
            'max'=>18,
            'step'=>1,
            // 'tooltip'=>'always',
            'formatter'=>new yii\web\JsExpression("function(val) { return ConvertString(val); }")
        ]
    ]) . '</div> <div class="col-md-1"> <b class="badge" style="background-color:#ff7e7e"> <h6 style="font-weight: bold;">Slope</h6> </b> '; ?>
    <?= '</div>' ?>

    <?= $form->field($model, 'slope_ripe')->HiddenInput()->label('') ?>


    <?= '</br> </br>' ?>


    <?= '<div class="col-md-1">' ?>
    <?= '<b class="badge" style="background-color:#ff7e7e"> <h6 style="font-weight: bold;">Peat Ripening</h6> </b> </div>'?>
    <?= '<div class="col-md-10">'.Slider::widget([
        'name'=>'slope_ripe',
        'value'=>10,
        'handleColor'=>Slider::TYPE_DANGER,
        'pluginEvents' => [
            'slideStop' => "function(val) { document.getElementById('land-slope_ripe').value = ConvertNumber(val.value); }",
        ],
        'pluginOptions'=>[
            'min'=>2,
            'max'=>18,
            'step'=>1,
            // 'tooltip'=>'always',
            'formatter'=>new yii\web\JsExpression("function(val) { return ConvertString(val); }")
        ]
    ]) . '</div> <div class="col-md-1"> <b class="badge" style="background-color:#ff7e7e"> <h6 style="font-weight: bold;">Slope</h6> </b> '; ?>
    <?= '</div>' ?>

    <?= $form->field($model, 'thick_ripe')->HiddenInput()->label('') ?>

    <?= '</br> </br>' ?>


    <?= '<div class="col-md-1">' ?>
    <?= '<b class="badge" style="background-color:#ff7e7e"> <h6 style="font-weight: bold;">Peat Ripening</h6> </b> </div>'?>
    <?= '<div class="col-md-10">'.Slider::widget([
        'name'=>'thick_ripe',
        'value'=>10,
        'handleColor'=>Slider::TYPE_DANGER,
        'pluginEvents' => [
            'slideStop' => "function(val) { document.getElementById('land-thick_ripe').value = ConvertNumber(val.value); }",
        ],
        'pluginOptions'=>[
            'min'=>2,
            'max'=>18,
            'step'=>1,
            // 'tooltip'=>'always',
            'formatter'=>new yii\web\JsExpression("function(val) { return ConvertString(val); }")
        ]
    ]) . '</div> <div class="col-md-1"> <b class="badge" style="background-color:#ff7e7e"> <p style="font-weight: bold;margin: 0 0 0 ;">Peat</p> </br> <p style="font-weight: bold;margin: 0 0 0 ;">Thickness</p> </b> </div>'?>
    <?= '</div>' ?>
   <?= '</br> </br>' ?>





<!-- Sub Factor Accessibility -->

    <?= $form->field($model, 'road_mills')->HiddenInput()->label('') ?>


    <?= '<div class="col-md-1">' ?>
    <?= '<b class="badge" style="background-color:#f6b800"> <p style="font-weight: bold;margin: 0 0 0 ;">Distance</p> </br> <p style="font-weight: bold;margin: 0 0 0 ;">from Mills</p> </b> </div>'?>
    <?= '<div class="col-md-10">'.Slider::widget([
        'name'=>'road_mills',
        'value'=>10,
        'handleColor'=>Slider::TYPE_WARNING,
        'pluginEvents' => [
            'slideStop' => "function(val) { document.getElementById('accessibility-road_mills').value = ConvertNumber(val.value); }",
        ],
        'pluginOptions'=>[
            'min'=>2,
            'max'=>18,
            'step'=>1,
            // 'tooltip'=>'always',
            'formatter'=>new yii\web\JsExpression("function(val) { return ConvertString(val); }")
        ]
    ]) . '</div> <div class="col-md-1"> <b class="badge" style="background-color:#f6b800"> <p style="font-weight: bold;margin: 0 0 0 ;">Distance</p> </br> <p style="font-weight: bold;margin: 0 0 0 ;">from Road</p> </b> '; ?>
    <?= '</div>' ?>

    <?= '</br> </br> </br> ' ?>

    <?= $form->field($model, 'road_town')->HiddenInput()->label('') ?>

    <?= '<div class="col-md-1">' ?>
    <?= '<b class="badge" style="background-color:#f6b800"> <p style="font-weight: bold;margin: 0 0 0 ;">Distance</p> </br> <p style="font-weight: bold;margin: 0 0 0 ;">from Town</p> </b> </div>'?>
    <?= '<div class="col-md-10">'.Slider::widget([
        'name'=>'road_town',
        'value'=>10,
        'handleColor'=>Slider::TYPE_WARNING,
        'pluginEvents' => [
            'slideStop' => "function(val) { document.getElementById('accessibility-road_town').value = ConvertNumber(val.value); }",
        ],
        'pluginOptions'=>[
            'min'=>2,
            'max'=>18,
            'step'=>1,
            // 'tooltip'=>'always',
            'formatter'=>new yii\web\JsExpression("function(val) { return ConvertString(val); }")
        ]
    ]) . '</div> <div class="col-md-1"> <b class="badge" style="background-color:#f6b800"> <p style="font-weight: bold;margin: 0 0 0 ;">Distance</p> </br> <p style="font-weight: bold;margin: 0 0 0 ;">from Road</p> </b> '; ?>
    <?= '</div>' ?>

    <?= '</br> </br> </br> ' ?>

    <?= $form->field($model, 'mills_town')->HiddenInput()->label('') ?>

    <?= '<div class="col-md-1">' ?>
    <?= '<b class="badge" style="background-color:#f6b800"> <p style="font-weight: bold;margin: 0 0 0 ;">Distance</p> </br> <p style="font-weight: bold;margin: 0 0 0 ;">from Town</p> </b> </div>'?>
    <?= '<div class="col-md-10">'.Slider::widget([
        'name'=>'mills_town',
        'value'=>10,
        'handleColor'=>Slider::TYPE_WARNING,
        'pluginEvents' => [
            'slideStop' => "function(val) { document.getElementById('accessibility-mills_town').value = ConvertNumber(val.value); }",
        ],
        'pluginOptions'=>[
            'min'=>2,
            'max'=>18,
            'step'=>1,
            // 'tooltip'=>'always',
            'formatter'=>new yii\web\JsExpression("function(val) { return ConvertString(val); }")
        ]
    ]) . '</div> <div class="col-md-1"> <b class="badge" style="background-color:#f6b800"> <p style="font-weight: bold;margin: 0 0 0 ;">Distance</p> </br> <p style="font-weight: bold;margin: 0 0 0 ;">from Mills</p> </b> '; ?>
    <?= '</div>' ?>

    <?= '</br> </br> </br> ' ?>






<!-- All Factors -->

    <?= $form->field($model, 'climate_land')->HiddenInput()->label('') ?>

    <?= '<div class="col-md-1">' ?>
    <?= '<b class="badge" style="background-color:#74c365"> <h6 style="font-weight: bold;">Land</h6> </b> </div>'?>
    <?= '<div class="col-md-10">'.Slider::widget([
        'name'=>'CH_TEMP',
        'value'=>10,
        'handleColor'=>Slider::TYPE_SUCCESS,
        'pluginEvents' => [
            'slideStop' => "function(val) { document.getElementById('factors-climate_land').value = ConvertNumber(val.value); }",
        ],
        'pluginOptions'=>[
            // 'handle'=>'square',
            'min'=>2,
            'max'=>18,
            'step'=>1,
            'tooltip_position'=> 'top',
            'formatter'=>new yii\web\JsExpression("function(val) { return ConvertString(val); }")
        ]
    ]) . '</div> <div class="col-md-1"> <b class="badge" style="background-color:#74c365"> <h6 style="font-weight: bold;">Climate</h6> </b> '; ?>
    <?= '</div>' ?>
    

    <?= '</br> </br> </br> </br>' ?>


    <?= $form->field($model, 'climate_accessibility')->HiddenInput()->label('') ?>

    <?= '<div class="col-md-1">' ?>
    <?= '<b class="badge" style="background-color:#74c365"> <h6 style="font-weight: bold;">Accessibility</h6> </b> </div>'?>
    <?= '<div class="col-md-10">'.Slider::widget([
        'name'=>'CH_DM',
        'value'=>10,
        'handleColor'=>Slider::TYPE_SUCCESS,
        'pluginEvents' => [
            'slideStop' => "function(val) { document.getElementById('factors-climate_accessibility').value = ConvertNumber(val.value); }",
        ],
        'pluginOptions'=>[
            'min'=>2,
            'max'=>18,
            'step'=>1,
            'tooltip_position'=> 'top',
            // 'tooltip'=>'always',
            'formatter'=>new yii\web\JsExpression("function(val) { return ConvertString(val); }")
        ]
    ]) . '</div> <div class="col-md-1"> <b class="badge" style="background-color:#74c365"> <h6 style="font-weight: bold;">Climate</h6> </b> '; ?>
    <?= '</div>' ?>
    

    <?= '</br> </br> </br> </br>' ?>

    <?= $form->field($model, 'land_accessibility')->HiddenInput()->label('') ?>

    <?= '<div class="col-md-1">' ?>
    <?= '<b class="badge" style="background-color:#74c365"> <h6 style="font-weight: bold;">Accessibility</h6> </b> </div>'?>
    <?= '<div class="col-md-10">'.Slider::widget([
        'name'=>'TEMP_DM',
        'value'=>10,
        'handleColor'=>Slider::TYPE_SUCCESS,
        'pluginEvents' => [
            'slideStop' => "function(val) { document.getElementById('factors-land_accessibility').value = ConvertNumber(val.value); }",
        ],
        'pluginOptions'=>[
            'min'=>2,
            'max'=>18,
            'step'=>1,
            // 'tooltip'=>'always',
            'formatter'=>new yii\web\JsExpression("function(val) { return ConvertString(val); }")
        ]
    ]) . '</div> <div class="col-md-1"> <b class="badge" style="background-color:#74c365"> <h6 style="font-weight: bold;">Land</h6> </b> '; ?>
    <?= '</div>' ?>
    <?= '</br> </br> </br> </br>' ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script type="text/javascript">
    function ConvertString(paramkiriman){
        if (paramkiriman == 2) {
            return '1/9';
        }
        if (paramkiriman == 3) {
            return '1/8';
        }
        if (paramkiriman == 4) {
            return '1/7';
        }
        if (paramkiriman == 5) {
            return '1/6';
        }
        if (paramkiriman == 6) {
            return '1/5';
        }
        if (paramkiriman == 7) {
            return '1/4';
        }
        if (paramkiriman == 8) {
            return '1/3';
        }
        if (paramkiriman == 9) {
            return '1/2';
        }
        if (paramkiriman == 10) {
            return '1';
        }
        if (paramkiriman == 11) {
            return '2/1';
        }
        if (paramkiriman == 12) {
            return '3/1';
        }
        if (paramkiriman == 13) {
            return '4/1';
        }
        if (paramkiriman == 14) {
            return '5/1';
        }
        if (paramkiriman == 15) {
            return '6/1';
        }
        if (paramkiriman == 16) {
            return '7/1';
        }
        if (paramkiriman == 17) {
            return '8/1';
        }
        if (paramkiriman == 18) {
            return '9/1';
        }
    }

    function ConvertNumber(paramkiriman){
        if (paramkiriman == 2) {
            return 1/9;
        }
        if (paramkiriman == 3) {
            return 1/8;
        }
        if (paramkiriman == 4) {
            return 1/7;
        }
        if (paramkiriman == 5) {
            return 1/6;
        }
        if (paramkiriman == 6) {
            return 1/5;
        }
        if (paramkiriman == 7) {
            return 1/4;
        }
        if (paramkiriman == 8) {
            return 1/3;
        }
        if (paramkiriman == 9) {
            return 1/2;
        }
        if (paramkiriman == 10) {
            return 1;
        }
        if (paramkiriman == 11) {
            return 2/1;
        }
        if (paramkiriman == 12) {
            return 3/1;
        }
        if (paramkiriman == 13) {
            return 4/1;
        }
        if (paramkiriman == 14) {
            return 5/1;
        }
        if (paramkiriman == 15) {
            return 6/1;
        }
        if (paramkiriman == 16) {
            return 7/1;
        }
        if (paramkiriman == 17) {
            return 8/1;
        }
        if (paramkiriman == 18) {
            return 9/1;
        }
    }
</script>
