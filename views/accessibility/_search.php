<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AccessibilitySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="accessibility-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'road_mills') ?>

    <?= $form->field($model, 'road_town') ?>

    <?= $form->field($model, 'mills_town') ?>

    <?= $form->field($model, 'bobot_road') ?>

    <?php // echo $form->field($model, 'bobot_mills') ?>

    <?php // echo $form->field($model, 'bobot_town') ?>

    <?php // echo $form->field($model, 'cr') ?>

    <?php // echo $form->field($model, 'validation')->checkbox() ?>

    <?php // echo $form->field($model, 'id_user') ?>

    <?php // echo $form->field($model, 'dates') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
