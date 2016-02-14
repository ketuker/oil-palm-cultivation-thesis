<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\slider\Slider;

/* @var $this yii\web\View */
/* @var $model app\models\Accessibility */
/* @var $form yii\widgets\ActiveForm */
?>
<style type="text/css">
.slider.slider-horizontal {
  width: 100%; /*changed*/
  height: 30px;
}
</style>
<div class="accessibility-form">
    <div id="cr" class="alert alert-warning" role="alert"> <?= Yii::t('app','Consistency Ratio') ?>: 0 and <?= Yii::t('app','Validation') ?> : true</div>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'road_mills')->HiddenInput()->label(false) ?>

    </br>

    <!-- Label Mills -->
    <div class="col-md-2">
    <button type="button" class="btn btn-warning" >
    <span ></span> <?= Yii::t('app','Distance From Mills') ?> 
    <span id="mills" class="badge">1</span></button></div>
    <?= '<div class="col-md-7">'.Slider::widget([
        'name'=>'road_mills',
        'value'=>10,
        'handleColor'=>Slider::TYPE_WARNING,
        'pluginEvents' => [
            'slideStop' => "function(val) { document.getElementById('accessibility-road_mills').value = ConvertNumber(val.value); 
            								document.getElementById('road').innerHTML         = ConvertPlus(val.value);
                							document.getElementById('mills').innerHTML         = ConvertMin(val.value);
                                            checkCR();
        }",
        ],
        'pluginOptions'=>[
            'min'=>2,
            'max'=>18,
            'step'=>1,
            'tooltip'=>'hide',
            'formatter'=>new yii\web\JsExpression("function(val) { return ConvertString(val); }")
        ]
    ]) . '</div>'?>
    <!-- Label Road -->
    <div class="col-md-2">
    <button type="button" class="btn btn-warning" >
    <span id="road" class="badge">1</span>
    <span ></span> <?= Yii::t('app','Distance From Road') ?>
    </button></div>

    <?= '</br> </br> </br> ' ?>

    <?= $form->field($model, 'road_town')->HiddenInput()->label(false) ?>

    <!-- Label Town -->
    <div class="col-md-2">
    <button type="button" class="btn btn-warning" >
    <span ></span> <?= Yii::t('app','Distance From Town') ?> 
    <span id="town" class="badge">1</span></button></div>
   <?= '<div class="col-md-7">'.Slider::widget([
        'name'=>'road_town',
        'value'=>10,
        'handleColor'=>Slider::TYPE_WARNING,
        'pluginEvents' => [
            'slideStop' => "function(val) { document.getElementById('accessibility-road_town').value = ConvertNumber(val.value); 
                        					document.getElementById('road2').innerHTML         = ConvertPlus(val.value);
                							document.getElementById('town').innerHTML         = ConvertMin(val.value);
                                            checkCR();
        }",
        ],
        'pluginOptions'=>[
            'min'=>2,
            'max'=>18,
            'step'=>1,
            'tooltip'=>'hide',
            'formatter'=>new yii\web\JsExpression("function(val) { return ConvertString(val); }")
        ]
    ]) . '</div>'?>
    <!-- Label Road -->
    <div class="col-md-2">
    <button type="button" class="btn btn-warning" >
    <span id="road2" class="badge">1</span>
    <span ></span> <?= Yii::t('app','Distance From Road') ?>
    </button></div>

    <?= '</br> </br> </br> ' ?>

    <?= $form->field($model, 'mills_town')->HiddenInput()->label(false) ?>


    <!-- Label Town -->
    <div class="col-md-2">
    <button type="button" class="btn btn-warning" >
    <span ></span> <?= Yii::t('app','Distance From Town') ?>
    <span id="town2" class="badge">1</span></button></div>
    <?= '<div class="col-md-7">'.Slider::widget([
        'name'=>'mills_town',
        'value'=>10,
        'handleColor'=>Slider::TYPE_WARNING,
        'pluginEvents' => [
            'slideStop' => "function(val) { document.getElementById('accessibility-mills_town').value = ConvertNumber(val.value); 
                        					document.getElementById('mills2').innerHTML         = ConvertPlus(val.value);
                							document.getElementById('town2').innerHTML         = ConvertMin(val.value);
                                            checkCR();

        }",
        ],
        'pluginOptions'=>[
            'min'=>2,
            'max'=>18,
            'step'=>1,
            'tooltip'=>'hide',
            'formatter'=>new yii\web\JsExpression("function(val) { return ConvertString(val); }")
        ]
    ]) . '</div>'?>
    <!-- Label Mills -->
    <div class="col-md-2">
    <button type="button" class="btn btn-warning" >
    <span id="mills2" class="badge">1</span>
    <span ></span> <?= Yii::t('app','Distance From Mills') ?>
    </button></div>

    <?= '</br> </br> </br> ' ?>

    <br><br><div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app','Create') : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script type="text/javascript">
    window.onload = Startup();

    function Startup(){
        document.getElementById('accessibility-road_mills').value = 1;
        document.getElementById('accessibility-road_town').value = 1;
        document.getElementById('accessibility-mills_town').value = 1;
    }

    function checkCR(){
        var road_mills = document.getElementById('accessibility-road_mills').value;
        var road_town = document.getElementById('accessibility-road_town').value;
        var mills_town   = document.getElementById('accessibility-mills_town').value;

        $.post("cr",{road_mills: road_mills,road_town: road_town, mills_town: mills_town}, function(data, status){
            obj = JSON.parse(data);
            document.getElementById('cr').innerHTML = 'Consistency Ratio : '+obj.cr+' and Validation : '+obj.validation;
        });
    }
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
function ConvertPlus(paramkiriman){
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
            return '2';
        }
        if (paramkiriman == 12) {
            return '3';
        }
        if (paramkiriman == 13) {
            return '4';
        }
        if (paramkiriman == 14) {
            return '5';
        }
        if (paramkiriman == 15) {
            return '6';
        }
        if (paramkiriman == 16) {
            return '7';
        }
        if (paramkiriman == 17) {
            return '8';
        }
        if (paramkiriman == 18) {
            return '9';
        }
    }

function ConvertMin(paramkiriman){
        if (paramkiriman == 2) {
            return '9';
        }
        if (paramkiriman == 3) {
            return '8';
        }
        if (paramkiriman == 4) {
            return '7';
        }
        if (paramkiriman == 5) {
            return '6';
        }
        if (paramkiriman == 6) {
            return '5';
        }
        if (paramkiriman == 7) {
            return '4';
        }
        if (paramkiriman == 8) {
            return '3';
        }
        if (paramkiriman == 9) {
            return '2';
        }
        if (paramkiriman == 10) {
            return '1';
        }
        if (paramkiriman == 11) {
            return '1/2';
        }
        if (paramkiriman == 12) {
            return '1/3';
        }
        if (paramkiriman == 13) {
            return '1/4';
        }
        if (paramkiriman == 14) {
            return '1/5';
        }
        if (paramkiriman == 15) {
            return '1/6';
        }
        if (paramkiriman == 16) {
            return '1/7';
        }
        if (paramkiriman == 17) {
            return '1/8';
        }
        if (paramkiriman == 18) {
            return '1/9';
        }
    }
</script>
