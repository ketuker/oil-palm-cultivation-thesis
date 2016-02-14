<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Compare */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Area of Interest'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compare-view">

<h3>Pairwise comparisons of data has not been inputted</h3>
<p> 
Sorry if you see this page then pairwise comparisons of data on a page is missing entirely.
</p>
<?=$climag.'</br>'.$landnpag.'</br>'.$landpag.'</br>'.$accessag.'</br>'.$factorag?>

</div>

