<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sensitivity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sensitivity-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput() ?>

    <?= $form->field($model, 'description')->textInput() ?>

    <?= $form->field($model, 'dates')->textInput() ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'data')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'st_area')->textInput() ?>

    <?= $form->field($model, 'data_rain')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'data_temp')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'data_dm')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'data_slope')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'data_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'data_elev')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'data_thick')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'data_ripe')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'data_road')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'data_mills')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'data_town')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_scenario')->textInput() ?>

    <?= $form->field($model, 'geom')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
