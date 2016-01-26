<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Compare */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="compare-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'title')->textInput() ?>

            <?= $form->field($model, 'description')->textArea(['rows' => '10']) ?>
        </div>
        <div class="col-md-6">
            <?= app\widgets\KetukerIntersects::widget([
                'options' => [
                    'library-js' => 'leaflet',
                    'width' => '100',
                    'height' => '310',
                    'setView'=> '-2, 125',
                    'setZoom'=> '4'
                ]
            ]);?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create Comparison' : 'Update Comparison', ['class' => $model->isNewRecord ? 'btn btn-success pull-right' : 'btn btn-primary pull-right']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
