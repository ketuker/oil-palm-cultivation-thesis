<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Tutorialcategory;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Tutorial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tutorial-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'title')->textInput() ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'id_category')->dropDownList(ArrayHelper::map(Tutorialcategory::find()->all(), 'id', 'category')) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'description')->textArea(['rows' => '6']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'image')->widget(FileInput::classname(), ['options' => ['accept' => 'image/*']]);?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
