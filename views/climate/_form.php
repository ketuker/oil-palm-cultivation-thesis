<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\slider\Slider;

/* @var $this yii\web\View */
/* @var $model app\models\Climate */
/* @var $form yii\widgets\ActiveForm */
?>
<style type="text/css">
.slider.slider-horizontal {
  width: 100%; /*changed*/
  height: 30px;
}
</style>
<div class="climate-form">
    <div id="cr" class="alert alert-info" role="alert"><?= Yii::t('app','Consistency Ratio') ?>: 0 and <?= Yii::t('app','Validation') ?> : true</div>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ch_temp')->HiddenInput()->label(false) ?>
    </br>

    <!-- Label Temperature -->
    <div class="col-md-2">
    <button type="button" class="btn btn-info" >
    <span ></span> <?= Yii::t('app','Temperature') ?>  
    <span id="temperature" class="badge">1</span></button></div>

	<?= '<div class="col-md-7">'.Slider::widget([

        'name'=>'CH_TEMP',
        'value'=>10,
        'handleColor'=>Slider::TYPE_INFO,
        'pluginEvents' => [
            'slideStop' => "function(val) { 
                document.getElementById('climate-ch_temp').value    = ConvertNumber(val.value); 
                document.getElementById('rainfal').innerHTML         = ConvertPlus(val.value);
                document.getElementById('temperature').innerHTML         = ConvertMin(val.value);
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
    <!-- Label Rainfal -->
    <div class="col-md-2">
    <button type="button" class="btn btn-info" >
    <span id="rainfal" class="badge">1</span>
    <span ></span> <?= Yii::t('app','Rainfall') ?> 
    </button></div>
    

    </br> </br> </br>

    <?= $form->field($model, 'ch_dm')->HiddenInput()->label(false) ?>


    <!-- Label Dry Month -->
    <div class="col-md-2">
    <button type="button" class="btn btn-info" >
    <span ></span> <?= Yii::t('app','Dry Month') ?> 
    <span id="dm" class="badge">1</span></button></div>

	<?= '<div class="col-md-7">'.Slider::widget([
        'name'=>'CH_DM',
        'value'=>10,
        'handleColor'=>Slider::TYPE_INFO,
        'pluginEvents' => [
            'slideStop' => "function(val) { document.getElementById('climate-ch_dm').value = ConvertNumber(val.value); 
                            				document.getElementById('rainfal2').innerHTML   		= ConvertPlus(val.value);
                							document.getElementById('dm').innerHTML         = ConvertMin(val.value);
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
    <!-- Label Rainfal -->
    <div class="col-md-2">
    <button type="button" class="btn btn-info" >
    <span id="rainfal2" class="badge">1</span>
    <span ></span> <?= Yii::t('app','Rainfall') ?> 
    </button></div>
    

    </br> </br> </br>

    <?= $form->field($model, 'temp_dm')->HiddenInput()->label(false) ?>


    <!-- Label Dry Month -->
    <div class="col-md-2">
    <button type="button" class="btn btn-info" >
    <span ></span> <?= Yii::t('app','Dry Month') ?>
    <span id="dm2" class="badge">1</span></button></div>
	<?= '<div class="col-md-7">'.Slider::widget([
        'name'=>'TEMP_DM',
        'value'=>10,
        'handleColor'=>Slider::TYPE_INFO,
        'pluginEvents' => [
            'slideStop' => "function(val) { document.getElementById('climate-temp_dm').value = ConvertNumber(val.value); 
            								document.getElementById('temperature2').innerHTML    = ConvertPlus(val.value);
                							document.getElementById('dm2').innerHTML          = ConvertMin(val.value);
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
    <!-- Label Temperature -->
    <div class="col-md-2">
    <button type="button" class="btn btn-info" >
    <span id="temperature2" class="badge">1</span>
    <span ></span> <?= Yii::t('app','Temperature') ?>
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
        document.getElementById('climate-ch_temp').value = 1;
        document.getElementById('climate-temp_dm').value = 1;
        document.getElementById('climate-ch_dm').value = 1;
    }

    function checkCR(){
        var ch_temp = document.getElementById('climate-ch_temp').value;
        var temp_dm = document.getElementById('climate-temp_dm').value;
        var ch_dm   = document.getElementById('climate-ch_dm').value;

        $.post("cr",{ch_temp: ch_temp,temp_dm: temp_dm, ch_dm: ch_dm}, function(data, status){
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