<?php
/* @var $this yii\web\View */
use kartik\tabs\TabsX;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\slider\Slider;

?>
<h3>Documentation</h3>
	<?= $content1 = 'awdhawjhdjahsjdhajwhdjahwjhdajhwd'?>
	<?= $content2 = 'awdhawjhdjahsjdhajwhdjahwjhdajhwd'?>
	<?= $content3 = 'awdhawjhdjahsjdhajwhdjahwjhdajhwd'?>
	<?= $content4 = 'awdhawjhdjahsjdhajwhdjahwjhdajhwd'?>
	<?= $items = [
	    [
	        'label'=>'<i class="glyphicon glyphicon-home"></i> Home',
	        'content'=>$content1,
	        'active'=>true
	    ],
	    [
	        'label'=>'<i class="glyphicon glyphicon-user"></i> Profile',
	        'content'=>$content2,
	        'linkOptions'=>['data-url'=>\yii\helpers\Url::to(['/site/tabs-data'])]
	    ],
	    [
	        'label'=>'<i class="glyphicon glyphicon-list-alt"></i> Dropdown',
	        'items'=>[
	             [
	                 'label'=>'<i class="glyphicon glyphicon-chevron-right"></i> Option 1',
	                 'encode'=>false,
	                 'content'=>$content3,
	             ],
	             [
	                 'label'=>'<i class="glyphicon glyphicon-chevron-right"></i> Option 2',
	                 'encode'=>false,
	                 'content'=>$content4,
	             ],
	        ],
	    ],
	    [
	        'label'=>'<i class="glyphicon glyphicon-king"></i> Disabled',
	        'headerOptions' => ['class'=>'disabled']
	    ],
	]; ?>


	<?=  TabsX::widget([
	    'items'=>$items,
	    'position'=>TabsX::POS_LEFT,
	    'bordered'=>true,
	    'encodeLabels'=>false,
	    'items'=>['content1'=> $content1]
	]); ?>

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



