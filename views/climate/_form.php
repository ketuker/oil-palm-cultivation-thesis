<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\slider\Slider;

/* @var $this yii\web\View */
/* @var $model app\models\Climate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="climate-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ch_temp')->HiddenInput()->label('') ?>

    <?= $form->field($model, 'ch_dm')->HiddenInput()->label('') ?>

    <?= $form->field($model, 'temp_dm')->HiddenInput()->label('') ?>

    <?= '<b class="badge">CH </b> ' . Slider::widget([
        'name'=>'CH_TEMP',
        'value'=>10,
        'pluginEvents' => [
            'slideStop' => "function(val) { document.getElementById('climate-ch_temp').value = ConvertNumber(val.value); }",
        ],
        'pluginOptions'=>[
            'min'=>2,
            'max'=>18,
            'step'=>1,
            'tooltip'=>'always',
            'formatter'=>new yii\web\JsExpression("function(val) { return ConvertString(val); }")
        ]
    ]) . '<b class="badge"> Temp</b> '; ?>

    <?= '<b class="badge">CH </b> ' . Slider::widget([
        'name'=>'CH_DM',
        'value'=>10,
        'pluginEvents' => [
            'slideStop' => "function(val) { document.getElementById('climate-ch_dm').value = ConvertNumber(val.value); }",
        ],
        'pluginOptions'=>[
            'min'=>2,
            'max'=>18,
            'step'=>1,
            'tooltip'=>'always',
            'formatter'=>new yii\web\JsExpression("function(val) { return ConvertString(val); }")
        ]
    ]) . '<b class="badge"> DM</b> '; ?>

<?= '<b class="badge">TEMP </b> ' . Slider::widget([
        'name'=>'TEMP_DM',
        'value'=>10,
        'pluginEvents' => [
            'slideStop' => "function(val) { document.getElementById('climate-temp_dm').value = ConvertNumber(val.value); }",
        ],
        'pluginOptions'=>[
            'min'=>2,
            'max'=>18,
            'step'=>1,
            'tooltip'=>'always',
            'formatter'=>new yii\web\JsExpression("function(val) { return ConvertString(val); }")
        ]
    ]) . '<b class="badge"> DM</b> '; ?>

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