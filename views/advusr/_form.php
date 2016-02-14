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

   <?= $form->field($model, 'ch_temp')->HiddenInput()->label(false) ?>
    <div id="crclimate" class="alert alert-info" role="alert"><?= Yii::t('app','Climate') ?> </br> <?= Yii::t('app','Consistency Ratio') ?>: 0 and <?= Yii::t('app','Validation') ?> : true</div>
    <!-- Label Temperature -->
    <div class="col-md-2">
    <button type="button" class="btn btn-info" >
    <span ></span> <?= Yii::t('app','Temperature') ?>  
    <span id="temperature" class="badge">1</span></button></div>

    <?= '<div class="col-md-7">'.Slider::widget([

        'name'=>'ch_temp',
        'value'=>10,
        'handleColor'=>Slider::TYPE_INFO,
        'pluginEvents' => [
            'slideStop' => "function(val) { 
                document.getElementById('advusr-ch_temp').value    = ConvertNumber(val.value); 
                document.getElementById('rainfal').innerHTML         = ConvertPlus(val.value);
                document.getElementById('temperature').innerHTML         = ConvertMin(val.value);
                checkCRclimate();
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
    

    </br>

    <?= $form->field($model, 'ch_dm')->HiddenInput()->label('') ?>


    <!-- Label Dry Month -->
    <div class="col-md-2">
    <button type="button" class="btn btn-info" >
    <span ></span> <?= Yii::t('app','Dry Month') ?>  
    <span id="dm" class="badge">1</span></button></div>

    <?= '<div class="col-md-7">'.Slider::widget([
        'name'=>'ch_dm',
        'value'=>10,
        'handleColor'=>Slider::TYPE_INFO,
        'pluginEvents' => [
            'slideStop' => "function(val) { document.getElementById('advusr-ch_dm').value = ConvertNumber(val.value); 
                                            document.getElementById('rainfal2').innerHTML           = ConvertPlus(val.value);
                                            document.getElementById('dm').innerHTML         = ConvertMin(val.value);
                                            checkCRclimate();

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
    

    </br>

    <?= $form->field($model, 'temp_dm')->HiddenInput()->label('') ?>


    <!-- Label Dry Month -->
    <div class="col-md-2">
    <button type="button" class="btn btn-info" >
    <span ></span> <?= Yii::t('app','Dry Month') ?>  
    <span id="dm2" class="badge">1</span></button></div>
    <?= '<div class="col-md-7">'.Slider::widget([
        'name'=>'temp_dm',
        'value'=>10,
        'handleColor'=>Slider::TYPE_INFO,
        'pluginEvents' => [
            'slideStop' => "function(val) { document.getElementById('advusr-temp_dm').value = ConvertNumber(val.value); 
                                            document.getElementById('temperature2').innerHTML    = ConvertPlus(val.value);
                                            document.getElementById('dm2').innerHTML          = ConvertMin(val.value);
                                            checkCRclimate();
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



<!--  SubFactors Land Non Peat-->

    <div id="crlandnpeat" class="alert alert-danger" role="alert"><?= Yii::t('app','Non Peatland') ?>   </br> <?= Yii::t('app','Consistency Ratio') ?>: 0 and <?= Yii::t('app','Validation') ?> : true</div>
    <?= $form->field($model, 'slope_text')->HiddenInput()->label(false) ?>
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
                document.getElementById('advusr-slope_text').value    = ConvertNumber(val.value); 
                document.getElementById('slope').innerHTML         = ConvertPlus(val.value);
                document.getElementById('texture').innerHTML         = ConvertMin(val.value);
                checkCRlandnpeat();
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
    </br> </br> 


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
                document.getElementById('advusr-slope_elev').value    = ConvertNumber(val.value); 
                document.getElementById('slope2').innerHTML         = ConvertPlus(val.value);
                document.getElementById('elev').innerHTML         = ConvertMin(val.value);
                checkCRlandnpeat();
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
    </br> </br>


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
                document.getElementById('advusr-text_elev').value    = ConvertNumber(val.value); 
                document.getElementById('texture2').innerHTML         = ConvertPlus(val.value);
                document.getElementById('elev2').innerHTML         = ConvertMin(val.value);
                checkCRlandnpeat();
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



<!-- Sub Factor Peatland -->
    <div id="crlandpeat" class="alert alert-danger" role="alert"><?= Yii::t('app','Peatland') ?>   </br> <?= Yii::t('app','Consistency Ratio') ?>: 0 and <?= Yii::t('app','Validation') ?> : true</div>
    <?= $form->field($model, 'slope_thick')->HiddenInput()->label(false) ?>
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
                document.getElementById('advusr-slope_thick').value    = ConvertNumber(val.value); 
                document.getElementById('slopep').innerHTML         = ConvertPlus(val.value);
                document.getElementById('thick').innerHTML         = ConvertMin(val.value);
                checkCRlandpeat();
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
    <span id="slopep" class="badge">1</span>
    <span ></span> <?= Yii::t('app','Slope') ?>
    </button></div>
    </br> </br>


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
                document.getElementById('advusr-slope_ripe').value    = ConvertNumber(val.value); 
                document.getElementById('slopep2').innerHTML         = ConvertPlus(val.value);
                document.getElementById('ripe').innerHTML         = ConvertMin(val.value);
                checkCRlandpeat();
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
    <span id="slopep2" class="badge">1</span>
    <span ></span> <?= Yii::t('app','Slope') ?>
    </button></div>
    </br> </br>


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
                document.getElementById('advusr-thick_ripe').value    = ConvertNumber(val.value); 
                document.getElementById('thick2').innerHTML         = ConvertPlus(val.value);
                document.getElementById('ripe2').innerHTML         = ConvertMin(val.value);
                checkCRlandpeat();
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



<!-- Accessibility -->
    <div id="craccess" class="alert alert-warning" role="alert"><?= Yii::t('app','Accessibility') ?>   </br> <?= Yii::t('app','Consistency Ratio') ?>: 0 and <?= Yii::t('app','Validation') ?> : true</div>
    <?= $form->field($model, 'road_mills')->HiddenInput()->label(false) ?>
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
            'slideStop' => "function(val) { document.getElementById('advusr-road_mills').value = ConvertNumber(val.value); 
                                            document.getElementById('road').innerHTML         = ConvertPlus(val.value);
                                            document.getElementById('mills').innerHTML         = ConvertMin(val.value);
                                            checkCRaccess();
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

    </br> </br>

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
            'slideStop' => "function(val) { document.getElementById('advusr-road_town').value = ConvertNumber(val.value); 
                                            document.getElementById('road2').innerHTML         = ConvertPlus(val.value);
                                            document.getElementById('town').innerHTML         = ConvertMin(val.value);
                                            checkCRaccess();
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

    </br> </br>

    <?= $form->field($model, 'mills_town')->HiddenInput()->label(false) ?>


    <!-- Label Town -->
    <div class="col-md-2">
    <button type="button" class="btn btn-warning" >
    <span ></span> Distance From Town 
    <span id="town2" class="badge">1</span></button></div>
    <?= '<div class="col-md-7">'.Slider::widget([
        'name'=>'mills_town',
        'value'=>10,
        'handleColor'=>Slider::TYPE_WARNING,
        'pluginEvents' => [
            'slideStop' => "function(val) { document.getElementById('advusr-mills_town').value = ConvertNumber(val.value); 
                                            document.getElementById('mills2').innerHTML         = ConvertPlus(val.value);
                                            document.getElementById('town2').innerHTML         = ConvertMin(val.value);
                                            checkCRaccess();

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

    </br> </br> </br>

<!-- All Factors -->
    <div id="crfactor" class="alert alert-success" role="alert"><?= Yii::t('app','Factors') ?> </br>  <?= Yii::t('app','Consistency Ratio') ?>: 0 and <?= Yii::t('app','Validation') ?> : true</div>
    <?= $form->field($model, 'climate_land')->HiddenInput()->label(false) ?>
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
            'slideStop' => "function(val) { document.getElementById('advusr-climate_land').value = ConvertNumber(val.value); 
                                            document.getElementById('climate').innerHTML         = ConvertPlus(val.value);
                                            document.getElementById('land').innerHTML         = ConvertMin(val.value);
                                            checkCRfactor();
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
    

    </br> </br>

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
            'slideStop' => "function(val) { document.getElementById('advusr-climate_accessibility').value = ConvertNumber(val.value); 
                                            document.getElementById('climate2').innerHTML         = ConvertPlus(val.value);
                                            document.getElementById('access').innerHTML         = ConvertMin(val.value);
                                            checkCRfactor();
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
    

    </br> </br>
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
            'slideStop' => "function(val) { document.getElementById('advusr-land_accessibility').value = ConvertNumber(val.value); 
                                            document.getElementById('land2').innerHTML         = ConvertPlus(val.value);
                                            document.getElementById('access2').innerHTML         = ConvertMin(val.value);
                                            checkCRfactor();
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









    </br> </br><div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app','Create') : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script type="text/javascript">
    window.onload = Startup();

    function Startup(){
        document.getElementById('advusr-ch_temp').value = 1;
        document.getElementById('advusr-temp_dm').value = 1;
        document.getElementById('advusr-ch_dm').value = 1;

        document.getElementById('advusr-slope_text').value = 1;
        document.getElementById('advusr-slope_elev').value = 1;
        document.getElementById('advusr-text_elev').value = 1;

        document.getElementById('advusr-slope_thick').value = 1;
        document.getElementById('advusr-slope_ripe').value = 1;
        document.getElementById('advusr-thick_ripe').value = 1;

        document.getElementById('advusr-road_town').value = 1;
        document.getElementById('advusr-road_mills').value = 1;
        document.getElementById('advusr-mills_town').value = 1;

        document.getElementById('advusr-climate_land').value = 1;
        document.getElementById('advusr-climate_accessibility').value = 1;
        document.getElementById('advusr-land_accessibility').value = 1;
    }

    function checkCRclimate(){
        var ch_temp = document.getElementById('advusr-ch_temp').value;
        var temp_dm = document.getElementById('advusr-temp_dm').value;
        var ch_dm   = document.getElementById('advusr-ch_dm').value;

        $.post("crclimate",{ch_temp: ch_temp,temp_dm: temp_dm, ch_dm: ch_dm}, function(dataclimate, statusclimate){
            obj = JSON.parse(dataclimate);
            document.getElementById('crclimate').innerHTML = 'Consistency Ratio : '+obj.crclimate+' and Validation : '+obj.validation;
        });
    }

    function checkCRlandnpeat(){
        var slope_text = document.getElementById('advusr-slope_text').value;
        var slope_elev = document.getElementById('advusr-slope_elev').value;
        var text_elev   = document.getElementById('advusr-text_elev').value;

        $.post("crlandnpeat",{slope_text: slope_text,slope_elev: slope_elev, text_elev: text_elev}, function(datalandnpeat, statuslandnpeat){
            obj = JSON.parse(datalandnpeat);
            document.getElementById('crlandnpeat').innerHTML = 'Consistency Ratio : '+obj.crlandnpeat+' and Validation : '+obj.validation;
        });
    }

    function checkCRlandpeat(){
        var slope_thick = document.getElementById('advusr-slope_thick').value;
        var slope_ripe = document.getElementById('advusr-slope_ripe').value;
        var thick_ripe   = document.getElementById('advusr-thick_ripe').value;

        $.post("crlandpeat",{slope_thick: slope_thick,slope_ripe: slope_ripe, thick_ripe: thick_ripe}, function(data, status){
            obj = JSON.parse(data);
            document.getElementById('crlandpeat').innerHTML = 'Consistency Ratio : '+obj.crlandpeat+' and Validation : '+obj.validation;
        });
    }

    function checkCRaccess(){
        var road_mills = document.getElementById('advusr-road_mills').value;
        var road_town = document.getElementById('advusr-road_town').value;
        var mills_town   = document.getElementById('advusr-mills_town').value;

        $.post("craccess",{road_mills: road_mills,road_town: road_town, mills_town: mills_town}, function(data, status){
            obj = JSON.parse(data);
            document.getElementById('craccess').innerHTML = 'Consistency Ratio : '+obj.craccess+' and Validation : '+obj.validation;
        });
    }

    function checkCRfactor(){
        var climate_land = document.getElementById('advusr-climate_land').value;
        var climate_accessibility = document.getElementById('advusr-climate_accessibility').value;
        var land_accessibility   = document.getElementById('advusr-land_accessibility').value;

        $.post("crfactor",{climate_land: climate_land,climate_accessibility: climate_accessibility, land_accessibility: land_accessibility}, function(data, status){
            obj = JSON.parse(data);
            document.getElementById('crfactor').innerHTML = 'Consistency Ratio : '+obj.crfactor+' and Validation : '+obj.validation;
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
