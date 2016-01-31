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
                            echo '<li role="presentation" class="active"><a href="'.Url::to(['index?id='.($i + 1)]).'">'.$category[$i]["category"].'</a></li>';
                        }else{
                            echo '<li role="presentation"><a href="'.Url::to(['index?id='.($i + 1)]).'">'.$category[$i]["category"].'</a></li>';
                        }
                    }else{
                        if ($i == 0) {
                            echo '<li role="presentation" class="active"><a href="'.Url::to(['index?id='.($i + 1)]).'">'.$category[$i]["category"].'</a></li>';
                        }else{
                            echo '<li role="presentation"><a href="'.Url::to(['index?id='.($i + 1)]).'">'.$category[$i]["category"].'</a></li>';
                        }
                    }
                }
            ?>
        </ul>
    </div>
    <div class="col-md-9">
        <?php 
            for ($i=0; $i < count($model); $i++) { 
                echo '<blockquote><h4><b><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> ' . $model[$i]['title'] . '</b></h4><br>';
                echo $model[$i]['description'] . '</blockquote><br>';
            }
        ;?>
    </div>
</div>
