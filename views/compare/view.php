<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Compare */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Area of Interest'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .info {
        padding: 6px 8px;
        font: 14px/16px Arial, Helvetica, sans-serif;
        background: white;
        background: rgba(255,255,255,0.8);
        box-shadow: 0 0 15px rgba(0,0,0,0.2);
        border-radius: 5px;
    }
    .info h4 {
        margin: 0 0 5px;
        color: #777;
    }

    .legend {
        text-align: left;
        line-height: 18px;
        color: #555;
    }
    .legend i {
        width: 18px;
        height: 18px;
        float: left;
        margin-right: 8px;
        opacity: 0.7;
    }
</style>
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
            'user.username',
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
               d > 3  ? "#54ff00" :
               d > 2   ? "#fffc00" :
               d > 1   ? "#ff7a00" :
               d > 0   ? "#ff0000" :
                          "#ff0000";
    }

    function style(feature) {
        return {
            fillColor: getColor(feature.properties.kesesuaian),
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
            fillColor: getColor0(feature.properties.status_suitability),
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
            layer.bindPopup(
                "<b>Suitability : </b>"+feature.properties.status_suitability
                                        +"</br>"+"<b>Climate</b>"
                                            +"</br>"+"Rainfall :"+feature.properties.ket_ch
                                            +"</br>"+"Temperature :"+feature.properties.ket_suhu
                                            +"</br>"+"Dry Month :"+feature.properties.ket_dm 
                                        +"</br>"+"<b>Land</b>"
                                            +"</br>"+"Slope :"+feature.properties.ket_lrg
                                            +"</br>"+"Texture :"+feature.properties.ket_text
                                            +"</br>"+"Elevation :"+feature.properties.ket_elev 
                                            +"</br>"+"Ripening :"+feature.properties.ket_peat_ripe                                            
                                            +"</br>"+"Thickness :"+feature.properties.ket_thick
                                        +"</br>"+"<b>Accessibility</b>"
                                            +"</br>"+"Road :"+feature.properties.distance_r
                                            +"</br>"+"Mills :"+feature.properties.distance_m
                                            +"</br>"+"Town :"+feature.properties.distance_k  
                                        +"</br>"+"<b>Constraint</b>"
                                            +"</br>"+"Forest Region :"+feature.properties.ket_kwsn
                                            +"</br>"+"Spatial Map :"+feature.properties.ket_rtrw
                                            +"</br>"+"River Banks :"+feature.properties.ket_cons_sung
                                            +"</br>"+"Settlement :"+feature.properties.ket_mukim
                                            +"</br>"+"PIPIB :"+feature.properties.ket_pipib       
             
                                        +"</br>"+"<b>Area : </b>"+feature.properties.luas


            );

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

    /** Legenda **/
    var legend = L.control({position: "bottomleft"});

    legend.onAdd = function (map) {
        var div = L.DomUtil.create("div", "info legend"),
            grades = [0, 10, 20, 50, 100, 200, 500, 1000],
            labels = [];
        div.innerHTML = \'<i style="background:#E31A1C">Very Suitable</i></br><i style="background:#54ff00">Suitable</i></br><i style="background:#fffc00">Mostly Suitable</i></br><i style="background:#ff7a00">Not Suitablez</i></br>\';
        return div;
    };

    legend.addTo(map);

';

$this->registerJs($script, \yii\web\View::POS_END); ?>