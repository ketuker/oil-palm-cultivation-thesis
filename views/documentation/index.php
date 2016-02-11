<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="row">
    <div class="col-md-3 thumbnail">
        <ul class="nav nav-pills nav-stacked">
            <?php
                for ($i=0; $i < count($category); $i++) {
                    if (isset($_GET['id'])) {
                        if ($_GET['id'] == $category[$i]["id"]) {
                            $aid    = $category[$i]["id"];
                            echo '<li role="presentation" class="active"><a href="'.Url::to(['index?id='.($i + 1)]).'">'.Yii::t('app',$category[$i]["category"]).'</a></li>';
                        }else{
                            echo '<li role="presentation"><a href="'.Url::to(['index?id='.($i + 1)]).'">'.Yii::t('app',$category[$i]["category"]).'</a></li>';
                        }
                    }else{
                        if ($i == 0) {
                            echo '<li role="presentation" class="active"><a href="'.Url::to(['index?id='.($i + 1)]).'">'.Yii::t('app',$category[$i]["category"]).'</a></li>';
                        }else{
                            echo '<li role="presentation"><a href="'.Url::to(['index?id='.($i + 1)]).'">'.Yii::t('app',$category[$i]["category"]).'</a></li>';
                        }
                    }
                }
            ?>
        </ul>
    </div>
    <div class="col-md-9">
        <?php 
            for ($i=0; $i < count($model); $i++) { 
                echo '<blockquote>';
                echo '<div class="row">';
                if ($model[$i]['image']) {
                    echo '<div class="col-md-12">';
                    echo '<img src="../uploads/foto/' . $model[$i]['image'] . '" alt="' . Yii::t('app', $model[$i]['title']). '" class="thumbnail" style="max-height:450px;">';
                    echo '</div>';
                }
                echo '<div class="col-md-12">';
                echo '<h4><b><span class="glyphicon glyphicon-tree-deciduous" aria-hidden="true"></span> ' . Yii::t('app', $model[$i]['title']) . '</b></h4><br>';
                echo Yii::t('app', $model[$i]['description']);
                echo '';
                echo '</div></blockquote><br>';
            }
        ;?>
    </div>
</div>
