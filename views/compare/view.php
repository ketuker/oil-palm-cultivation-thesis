<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Compare */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Area of Interest'), 'url' => ['index']];
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
            'dates:date',
            'id_user',
            //'data:ntext',
            'st_area',
            //'geom',
        ],
    ]) ?>

    <?php /*echo app\widgets\KetukerChart::widget([
        'options' => [
            'data' => $data_chart
        ]
    ]);*/?>

    <p>
        <?= Html::a(Yii::t('app','Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app','Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app','Are you sure you want to delete this item?'),
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
            fillColor: getColor(feature.properties.status_climate),
            weight: 2,
            opacity: 1,
            color: "white",
            dashArray: "3",
            fillOpacity: 0.7
        }
    }

    function getColor0(d) {
        return d = 4  ? "#E31A1C" :
               d = 3  ? "#FC4E2A" :
               d = 2   ? "#FD8D3C" :
               d = 1   ? "#FEB24C" :
               d > 0   ? "#FED976" :
                          "#FFEDA0";
    }

    function style0(feature) {
        return {
            fillColor: getColor0(feature.properties.status_climate),
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
            layer.bindPopup("Status : "+feature.properties.status_climate);
        }
    }
    function onEachFeatureRain(feature, layer) {
        // does this feature have a property named popupContent?
        if (feature.properties) {
            layer.bindPopup("Rainfall : "+feature.properties.status_rainfall);
        }
    }
    function onEachFeatureTemp(feature, layer) {
        // does this feature have a property named popupContent?
        if (feature.properties) {
            layer.bindPopup("Temperature : "+feature.properties.status_temperature);
        }
    }

    function onEachFeatureDm(feature, layer) {
        // does this feature have a property named popupContent?
        if (feature.properties) {
            layer.bindPopup("Drymonth : "+feature.properties.status_drymonth);
        }
    }

    function onEachFeatureSlp(feature, layer) {
        // does this feature have a property named popupContent?
        if (feature.properties) {
            layer.bindPopup("Slope : "+feature.properties.status_slope);
        }
    }

    function onEachFeatureTxt(feature, layer) {
        // does this feature have a property named popupContent?
        if (feature.properties) {
            layer.bindPopup("Texture : "+feature.properties.status_texture);
        }
    }

    function onEachFeatureElev(feature, layer) {
        // does this feature have a property named popupContent?
        if (feature.properties) {
            layer.bindPopup("Elevation : "+feature.properties.status_elevation);
        }
    }

    function onEachFeatureThick(feature, layer) {
        // does this feature have a property named popupContent?
        if (feature.properties) {
            layer.bindPopup("Peat Thickness : "+feature.properties.status_thickness);
        }
    }

    function onEachFeatureRipe(feature, layer) {
        // does this feature have a property named popupContent?
        if (feature.properties) {
            layer.bindPopup("Peat Ripening : "+feature.properties.status_ripening);
        }
    }

    function onEachFeatureRoad(feature, layer) {
        // does this feature have a property named popupContent?
        if (feature.properties) {
            layer.bindPopup("Distance From Road : "+feature.properties.status_road);
        }
    }

    function onEachFeatureMills(feature, layer) {
        // does this feature have a property named popupContent?
        if (feature.properties) {
            layer.bindPopup("Distance From Mills : "+feature.properties.status_mills);
        }
    }

    function onEachFeatureTown(feature, layer) {
        // does this feature have a property named popupContent?
        if (feature.properties) {
            layer.bindPopup("Distance From Town : "+feature.properties.status_town);
        }
    }


    var geojsonDraw = ' . $query_geom_to_geojson_value . ';
    var RendergeojsonDraw = L.geoJson(geojsonDraw).addTo(map);

    var geojsonFeatureRain = ' . $model->data_rain . ';
    var RendergeojsonFeatureRain = L.geoJson(geojsonFeatureRain, {
        onEachFeature: onEachFeatureRain,
        style: style0,
    }).addTo(map);

    var geojsonFeatureTemp = ' . $model->data_temp . ';
    var RendergeojsonFeatureTemp = L.geoJson(geojsonFeatureTemp, {
        onEachFeature: onEachFeatureTemp,
        style: style0,
    }).addTo(map);

    var geojsonFeatureDm = ' . $model->data_dm . ';
    var RendergeojsonFeatureDm = L.geoJson(geojsonFeatureDm, {
        onEachFeature: onEachFeatureDm,
        style: style0,
    }).addTo(map);

    var geojsonFeatureSlp = ' . $model->data_slope . ';
    var RendergeojsonFeatureSlp = L.geoJson(geojsonFeatureSlp, {
        onEachFeature: onEachFeatureSlp,
        style: style0,
    }).addTo(map);

    var geojsonFeatureTxt = ' . $model->data_text . ';
    var RendergeojsonFeatureTxt = L.geoJson(geojsonFeatureTxt, {
        onEachFeature: onEachFeatureTxt,
        style: style0,
    }).addTo(map);

    var geojsonFeatureElev = ' . $model->data_elev . ';
    var RendergeojsonFeatureElev = L.geoJson(geojsonFeatureElev, {
        onEachFeature: onEachFeatureElev,
        style: style0,
    }).addTo(map);

    var geojsonFeatureThick = ' . $model->data_thick . ';
    var RendergeojsonFeatureThick = L.geoJson(geojsonFeatureThick, {
        onEachFeature: onEachFeatureThick,
        style: style0,
    }).addTo(map);

    var geojsonFeatureRipe = ' . $model->data_ripe . ';
    var RendergeojsonFeatureRipe = L.geoJson(geojsonFeatureRipe, {
        onEachFeature: onEachFeatureRipe,
        style: style0,
    }).addTo(map);

    var geojsonFeatureRoad = ' . $model->data_road . ';
    var RendergeojsonFeatureRoad = L.geoJson(geojsonFeatureRoad, {
        onEachFeature: onEachFeatureRoad,
        style: style0,
    }).addTo(map);

    var geojsonFeatureMills = ' . $model->data_mills . ';
    var RendergeojsonFeatureMills = L.geoJson(geojsonFeatureMills, {
        onEachFeature: onEachFeatureMills,
        style: style0,
    }).addTo(map);

    var geojsonFeatureTown = ' . $model->data_town . ';
    var RendergeojsonFeatureTown = L.geoJson(geojsonFeatureTown, {
        onEachFeature: onEachFeatureTown,
        style: style0,
    }).addTo(map);


    var geojsonFeature = ' . $model->data . ';
    var RendergeojsonFeature = L.geoJson(geojsonFeature, {
        onEachFeature: onEachFeature,
        style: style,
    }).addTo(map);



    map.fitBounds(RendergeojsonDraw.getBounds());

    layercontrol.addOverlay(RendergeojsonFeature, "Hasil");
    layercontrol.addOverlay(RendergeojsonFeatureRain, "Rainfall");
    layercontrol.addOverlay(RendergeojsonFeatureTemp, "Temperature");
    layercontrol.addOverlay(RendergeojsonFeatureDm, "Dry Month");
    layercontrol.addOverlay(RendergeojsonFeatureSlp, "Slope");
    layercontrol.addOverlay(RendergeojsonFeatureTxt, "Texture");
    layercontrol.addOverlay(RendergeojsonFeatureElev, "Elevation");
    layercontrol.addOverlay(RendergeojsonFeatureThick, "Peat Thickness");
    layercontrol.addOverlay(RendergeojsonFeatureRipe, "Peat Ripening");
    layercontrol.addOverlay(RendergeojsonFeatureRoad, "Distance From Road");
    layercontrol.addOverlay(RendergeojsonFeatureMills, "Distance From Mills");
    layercontrol.addOverlay(RendergeojsonFeatureTown, "Distance From Town");

    layercontrol.addOverlay(RendergeojsonDraw, "Area Of Interest");
';

$this->registerJs($script, \yii\web\View::POS_END); ?>