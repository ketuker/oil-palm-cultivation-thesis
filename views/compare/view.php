<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Compare */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Compares', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compare-view">

    <div class="list-group-item"><h4 class="list-group-item-heading"><b><center><?= $model->title;?></center></b></h4></div>
    <?= app\widgets\KetukerMap::widget();?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'title',
            'description',
            'dates',
            'id_user',
            //'data:ntext',
            'st_area',
            //'geom',
        ],
    ]) ?>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    
</div>

<?php
$script = '';

$script .= '
    
    function getColor(d) {
        return d > 4  ? "#E31A1C" :
               d > 3  ? "#FC4E2A" :
               d > 2   ? "#FD8D3C" :
               d > 1   ? "#FEB24C" :
               d > 0   ? "#FED976" :
                          "#FFEDA0";
    }

    function style(feature) {
        return {
            fillColor: getColor(feature.properties.status),
            weight: 2,
            opacity: 1,
            color: "white",
            dashArray: "3",
            fillOpacity: 0.7
        }
    }

    function onEachFeature(feature, layer) {
        // does this feature have a property named popupContent?
        if (feature.properties) {
            layer.bindPopup("Status : "+feature.properties.status);
        }
    }

    var geojsonDraw = ' . $query_geom_to_geojson_value . ';
    var RendergeojsonDraw = L.geoJson(geojsonDraw).addTo(map);

    var geojsonFeature = ' . $model->data . ';
    var RendergeojsonFeature = L.geoJson(geojsonFeature, {
        onEachFeature: onEachFeature,
        style: style,
    }).addTo(map);

    map.fitBounds(RendergeojsonDraw.getBounds());

    layercontrol.addOverlay(RendergeojsonFeature, "Hasil");
    layercontrol.addOverlay(RendergeojsonDraw, "Polygon Draw");
';

$this->registerJs($script, \yii\web\View::POS_END); ?>