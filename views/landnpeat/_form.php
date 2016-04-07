<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\slider\Slider;

/* @var $this yii\web\View */
/* @var $model app\models\Landnpeat */
/* @var $form yii\widgets\ActiveForm */
?>
<style type="text/css">
.slider.slider-horizontal {
  width: 100%; /*changed*/
  height: 30px;
}
</style>
<div class="landnpeat-form">
    <div id="cr" class="alert alert-danger" role="alert"><?= Yii::t('app','Consistency Ratio') ?>: 0 and <?= Yii::t('app','Validation') ?> : true</div>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'slope_text')->HiddenInput()->label(false) ?>
    </br>

        <!-- Label Texture -->
    <div class="col-md-2">
    <button type="button" class="btn btn-danger" >
    <span ></span> <?= Yii::t('app','Texture') ?> 
    <span id="texture" class="badge">1</span></button></div>

    <?= '<div class="col-md-7">'.Slider::widget([

        'name'=>'slope_text',
        'value'=>10,
        'handleColor'=>Slider::TYPE_DANGER,
        'pluginEvents' => [
            'slideStop' => "function(val) { 
                document.getElementById('landnpeat-slope_text').value    = ConvertNumber(val.value); 
                document.getElementById('slope').innerHTML         = ConvertPlus(val.value);
                document.getElementById('texture').innerHTML         = ConvertMin(val.value);
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
    <!-- Label Slope -->
    <div class="col-md-2">
    <button type="button" class="btn btn-danger" >
    <span id="slope" class="badge">1</span>
    <span ></span> <?= Yii::t('app','Slope') ?> 
    </button></div>
    </br> </br> </br>


    <?= $form->field($model, 'slope_elev')->HiddenInput()->label(false) ?>

        <!-- Label Elevation -->
    <div class="col-md-2">
    <button type="button" class="btn btn-danger" >
    <span ></span> <?= Yii::t('app','Elevation') ?> 
    <span id="elev" class="badge">1</span></button></div>

    <?= '<div class="col-md-7">'.Slider::widget([

        'name'=>'slope_elev',
        'value'=>10,
        'handleColor'=>Slider::TYPE_DANGER,
        'pluginEvents' => [
            'slideStop' => "function(val) { 
                document.getElementById('landnpeat-slope_elev').value    = ConvertNumber(val.value); 
                document.getElementById('slope2').innerHTML         = ConvertPlus(val.value);
                document.getElementById('elev').innerHTML         = ConvertMin(val.value);
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
    <!-- Label Slope -->
    <div class="col-md-2">
    <button type="button" class="btn btn-danger" >
    <span id="slope2" class="badge">1</span>
    <span ></span> <?= Yii::t('app','Slope') ?> 
    </button></div>
    </br> </br> </br>


    <?= $form->field($model, 'text_elev')->HiddenInput()->label(false) ?>

        <!-- Label Elevation -->
    <div class="col-md-2">
    <button type="button" class="btn btn-danger" >
    <span ></span> <?= Yii::t('app','Elevation') ?>
    <span id="elev2" class="badge">1</span></button></div>

    <?= '<div class="col-md-7">'.Slider::widget([

        'name'=>'text_elev',
        'value'=>10,
        'handleColor'=>Slider::TYPE_DANGER,
        'pluginEvents' => [
            'slideStop' => "function(val) { 
                document.getElementById('landnpeat-text_elev').value    = ConvertNumber(val.value); 
                document.getElementById('texture2').innerHTML         = ConvertPlus(val.value);
                document.getElementById('elev2').innerHTML         = ConvertMin(val.value);
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
    <!-- Label Texture -->
    <div class="col-md-2">
    <button type="button" class="btn btn-danger" >
    <span id="texture2" class="badge">1</span>
    <span ></span> <?= Yii::t('app','Texture') ?> 
    </button></div>
    </br> </br> </br>


    </br> </br> <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app','Create') : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script type="text/javascript">
    window.onload = Startup();

    function Startup(){
        document.getElementById('landnpeat-slope_text').value = 1;
        document.getElementById('landnpeat-slope_elev').value = 1;
        document.getElementById('landnpeat-text_elev').value = 1;
    }

    function checkCR(){
        var slope_text = document.getElementById('landnpeat-slope_text').value;
        var slope_elev = document.getElementById('landnpeat-slope_elev').value;
        var text_elev   = document.getElementById('landnpeat-text_elev').value;

        $.post("cr",{slope_text: slope_text,slope_elev: slope_elev, text_elev: text_elev}, function(data, status){
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