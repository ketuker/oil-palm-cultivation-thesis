<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\slider\Slider;

/* @var $this yii\web\View */
/* @var $model app\models\Land */
/* @var $form yii\widgets\ActiveForm */
?>
<style type="text/css">
.slider.slider-horizontal {
  width: 100%; /*changed*/
  height: 30px;
}
</style>
<div class="land-form">

    <?php $form = ActiveForm::begin(); ?>

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

    <br><br><div class="form-group">
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

