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

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'road_mills')->HiddenInput()->label('') ?>


    <?= '<div class="col-md-2">' ?>
    <?= '<b class="badge" style="background-color:#f6b800"> <h6 style="font-weight: bold;">Distance from Mills <span class="badge">'?><?= 4 ?> <?='</span></h6>  </b> </div>'?>
    <?= '<div class="col-md-7">'.Slider::widget([
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
    ]) . '</div> <div class="col-md-2"> <b class="badge" style="background-color:#f6b800"> <h6 style="font-weight: bold;"> <span class="badge">'?><?= 4 ?> <?='</span> Distance from Road </h6> </b> '; ?>
    <?= '</div>' ?>

    <?= '</br> </br> </br> ' ?>

    <?= $form->field($model, 'road_town')->HiddenInput()->label('') ?>

    <?= '<div class="col-md-2">' ?>
    <?= '<b class="badge" style="background-color:#f6b800"> <h6 style="font-weight: bold;">Distance from Town <span class="badge">'?><?= 4 ?> <?='</span></h6>  </b> </div>'?>
    <?= '<div class="col-md-7">'.Slider::widget([
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
    ]) . '</div> <div class="col-md-2"> <b class="badge" style="background-color:#f6b800"> <h6 style="font-weight: bold;"> <span class="badge">'?><?= 4 ?> <?='</span> Distance from Road </h6> </b> '; ?>
    <?= '</div>' ?>

    <?= '</br> </br> </br> ' ?>

    <?= $form->field($model, 'mills_town')->HiddenInput()->label('') ?>

    <?= '<div class="col-md-2">' ?>
    <?= '<b class="badge" style="background-color:#f6b800"> <h6 style="font-weight: bold;">Distance from Town <span class="badge">'?><?= 4 ?> <?='</span></h6>  </b> </div>'?>
    <?= '<div class="col-md-7">'.Slider::widget([
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
    ]) . '</div> <div class="col-md-2"> <b class="badge" style="background-color:#f6b800"> <h6 style="font-weight: bold;"> <span class="badge">'?><?= 4 ?> <?='</span> Distance from Mills </h6> </b> '; ?>
    <?= '</div>' ?>

    <?= '</br> </br> </br> ' ?>

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
