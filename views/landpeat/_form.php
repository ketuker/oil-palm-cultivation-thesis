<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\slider\Slider;


/* @var $this yii\web\View */
/* @var $model app\models\Landpeat */
/* @var $form yii\widgets\ActiveForm */
?>
<style type="text/css">
.slider.slider-horizontal {
  width: 100%; /*changed*/
  height: 30px;
}
</style>

<div class="landpeat-form">
    <div id="cr" class="alert alert-danger" role="alert"><?= Yii::t('app','Consistency Ratio') ?>: 0 and <?= Yii::t('app','Validation') ?>: true</div>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'slope_thick')->HiddenInput()->label(false) ?>
    </br>
        <!-- Label Thicknes -->
    <div class="col-md-2">
    <button type="button" class="btn btn-danger" >
    <span ></span> <?= Yii::t('app','Peat Thickness') ?> 
    <span id="thick" class="badge">1</span></button></div>

    <?= '<div class="col-md-7">'.Slider::widget([

        'name'=>'slope_thick',
        'value'=>10,
        'handleColor'=>Slider::TYPE_DANGER,
        'pluginEvents' => [
            'slideStop' => "function(val) { 
                document.getElementById('landpeat-slope_thick').value    = ConvertNumber(val.value); 
                document.getElementById('slope').innerHTML         = ConvertPlus(val.value);
                document.getElementById('thick').innerHTML         = ConvertMin(val.value);
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


    <?= $form->field($model, 'slope_ripe')->HiddenInput()->label(false) ?>

        <!-- Label Ripe -->
    <div class="col-md-2">
    <button type="button" class="btn btn-danger" >
    <span ></span> <?= Yii::t('app','Peat Ripening') ?>
    <span id="ripe" class="badge">1</span></button></div>

    <?= '<div class="col-md-7">'.Slider::widget([

        'name'=>'slope_ripe',
        'value'=>10,
        'handleColor'=>Slider::TYPE_DANGER,
        'pluginEvents' => [
            'slideStop' => "function(val) { 
                document.getElementById('landpeat-slope_ripe').value    = ConvertNumber(val.value); 
                document.getElementById('slope2').innerHTML         = ConvertPlus(val.value);
                document.getElementById('ripe').innerHTML         = ConvertMin(val.value);
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


    <?= $form->field($model, 'thick_ripe')->HiddenInput()->label(false) ?>

        <!-- Label Ripe -->
    <div class="col-md-2">
    <button type="button" class="btn btn-danger" >
    <span ></span> <?= Yii::t('app','Peat Ripening') ?>
    <span id="ripe2" class="badge">1</span></button></div>

    <?= '<div class="col-md-7">'.Slider::widget([

        'name'=>'thick_ripe',
        'value'=>10,
        'handleColor'=>Slider::TYPE_DANGER,
        'pluginEvents' => [
            'slideStop' => "function(val) { 
                document.getElementById('landpeat-thick_ripe').value    = ConvertNumber(val.value); 
                document.getElementById('thick2').innerHTML         = ConvertPlus(val.value);
                document.getElementById('ripe2').innerHTML         = ConvertMin(val.value);
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
    <!-- Label Thickness -->
    <div class="col-md-2">
    <button type="button" class="btn btn-danger" >
    <span id="thick2" class="badge">1</span>
    <span ></span> <?= Yii::t('app','Peat Thickness') ?>
    </button></div>
    </br> </br> </br>



    </br> </br><div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app','Create') : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script type="text/javascript">
    window.onload = Startup();

    function Startup(){
        document.getElementById('landpeat-slope_thick').value = 1;
        document.getElementById('landpeat-slope_ripe').value = 1;
        document.getElementById('landpeat-thick_ripe').value = 1;
    }

    function checkCR(){
        var slope_thick = document.getElementById('landpeat-slope_thick').value;
        var slope_ripe = document.getElementById('landpeat-slope_ripe').value;
        var thick_ripe   = document.getElementById('landpeat-thick_ripe').value;

        $.post("cr",{slope_thick: slope_thick,slope_ripe: slope_ripe, thick_ripe: thick_ripe}, function(data, status){
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
