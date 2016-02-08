<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\slider\Slider;

/* @var $this yii\web\View */
/* @var $model app\models\Factors */
/* @var $form yii\widgets\ActiveForm */
?>
<style type="text/css">
.slider.slider-horizontal {
  width: 100%; /*changed*/
  height: 30px;
}
</style>
<div class="climate-form">
    <div id="cr" class="alert alert-success" role="alert"><?= Yii::t('app','Consistency Ratio') ?>: 0 and <?= Yii::t('app','Validation') ?> : true</div>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'climate_land')->HiddenInput()->label(false) ?>
    </br>

    <!-- Label Land -->
    <div class="col-md-2">
    <button type="button" class="btn btn-success" >
    <span ></span> <?= Yii::t('app','Land') ?> 
    <span id="land" class="badge">1</span></button></div>  

    <?= '<div class="col-md-7">'.Slider::widget([
        'name'=>'climate_land',
        'value'=>10,
        'handleColor'=>Slider::TYPE_SUCCESS,
        'pluginEvents' => [
            'slideStop' => "function(val) { document.getElementById('factors-climate_land').value = ConvertNumber(val.value); 
                                            document.getElementById('climate').innerHTML         = ConvertPlus(val.value);
                                            document.getElementById('land').innerHTML         = ConvertMin(val.value);
                                            checkCR();
        }",
        ],
        'pluginOptions'=>[
            // 'handle'=>'square',
            'min'=>2,
            'max'=>18,
            'step'=>1,
            'tooltip_position'=> 'top',
            'tooltip'=>'hide',
            'formatter'=>new yii\web\JsExpression("function(val) { return ConvertString(val); }")
        ]
    ]) . '</div>'?>
    <!-- Label Climate -->
    <div class="col-md-2">
    <button type="button" class="btn btn-success" >
    <span id="climate" class="badge">1</span>
    <span ></span> <?= Yii::t('app','Climate') ?>
    </button></div>
    

    </br> </br> </br> 


    <?= $form->field($model, 'climate_accessibility')->HiddenInput()->label(false) ?>

    <!-- Label Accessibility -->
    <div class="col-md-2">
    <button type="button" class="btn btn-success" >
    <span ></span> <?= Yii::t('app','Accessibility') ?>
    <span id="access" class="badge">1</span></button></div>  
    <?= '<div class="col-md-7">'.Slider::widget([
        'name'=>'climate_accessibility',
        'value'=>10,
        'handleColor'=>Slider::TYPE_SUCCESS,
        'pluginEvents' => [
            'slideStop' => "function(val) { document.getElementById('factors-climate_accessibility').value = ConvertNumber(val.value); 
                                            document.getElementById('climate2').innerHTML         = ConvertPlus(val.value);
                                            document.getElementById('access').innerHTML         = ConvertMin(val.value);
                                            checkCR();
        }",
        ],
        'pluginOptions'=>[
            'min'=>2,
            'max'=>18,
            'step'=>1,
            'tooltip_position'=> 'top',
            'tooltip'=>'hide',
            'formatter'=>new yii\web\JsExpression("function(val) { return ConvertString(val); }")
        ]
    ]) . '</div>'?>
    <!-- Label Climate -->
    <div class="col-md-2">
    <button type="button" class="btn btn-success" >
    <span id="climate2" class="badge">1</span>
    <span ></span> <?= Yii::t('app','Climate') ?>
    </button></div>
    

    </br> </br> </br>

    <?= $form->field($model, 'land_accessibility')->HiddenInput()->label(false) ?>

    <!-- Label Accessibility -->
    <div class="col-md-2">
    <button type="button" class="btn btn-success" >
    <span ></span> <?= Yii::t('app','Accessibility') ?>
    <span id="access2" class="badge">1</span></button></div> 
    <?= '<div class="col-md-7">'.Slider::widget([
        'name'=>'land_accessibility',
        'value'=>10,
        'handleColor'=>Slider::TYPE_SUCCESS,
        'pluginEvents' => [
            'slideStop' => "function(val) { document.getElementById('factors-land_accessibility').value = ConvertNumber(val.value); 
                                            document.getElementById('land2').innerHTML         = ConvertPlus(val.value);
                                            document.getElementById('access2').innerHTML         = ConvertMin(val.value);
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
    <!-- Label Land -->
    <div class="col-md-2">
    <button type="button" class="btn btn-success" >
    <span id="land2" class="badge">1</span>
    <span ></span> <?= Yii::t('app','Land') ?>
    </button></div>
    </br> </br> </br>



    <br><br><div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app','Create') : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script type="text/javascript">
    window.onload = Startup();

    function Startup(){
        document.getElementById('factors-climate_land').value = 1;
        document.getElementById('factors-climate_accessibility').value = 1;
        document.getElementById('factors-land_accessibility').value = 1;
    }

    function checkCR(){
        var climate_land = document.getElementById('factors-climate_land').value;
        var climate_accessibility = document.getElementById('factors-climate_accessibility').value;
        var land_accessibility   = document.getElementById('factors-land_accessibility').value;

        $.post("cr",{climate_land: climate_land,climate_accessibility: climate_accessibility, land_accessibility: land_accessibility}, function(data, status){
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
