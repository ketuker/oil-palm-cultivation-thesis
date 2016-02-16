<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Compare */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="compare-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'title')->textInput() ?>
        </div>
        <div class="col-md-6">
            <?php echo $form->field($model, 'data')->widget(FileInput::classname(), [
                'options' => [
                'accept' => 'zip',

                ],
                // 'pluginOptions' => [
                //     'showPreview' => false,
                //     'pluginLoading' => true,
                //     //'showCaption' => true,
                //     //'showRemove' => true,
                //     //'showUpload' => false
                // ],
            ]);
            ?>
        </div>
    </div>
    <?= $form->field($model, 'description')->textArea(['rows' => '7']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app','Create AOI') : Yii::t('app','Update AOI'), ['class' => $model->isNewRecord ? 'btn btn-success pull-right' : 'btn btn-primary pull-right']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
