<?php

use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<style type="text/css">
.text-labels {
    font-size: small;
    font-weight: bold;
    color: white;
}
</style>

<?= Yii::$app->language ;?>
<br>
<?= Yii::$app->getRequest()->getCookies()->getValue('lang');?>
<h3><center>Welcome to Web GIS Application for Selecting Oil Palm Plantation Site</center></h3>
<div class="site-index">

    <?= app\widgets\KetukerMap::widget();?>
    
</div>

<?php

$script = '
	/* Fit Bounds */
    var bbox_geojson 		= '.$bbox_geojson.';
    var bbox_geojson_all 	= L.geoJson(bbox_geojson);
    map.fitBounds(bbox_geojson_all.getBounds());
';

for ($i=0; $i < count($data_admin); $i++) { 
    $script .= '

        var myStyle = {
            "color": "#ff7800",
            "weight": 2,
            "opacity": 0.65
        };

        var onEachFeature = function(feature, layer) {
            layer.on("click", function (e) {
                window.location.replace("'.Url::to(['admin/view']).'/"+feature.properties.gid);
            });
        };

        var geojson'.$i.' = {"type": "Feature","properties": {"gid": "'.$data_admin[$i]['gid'].'", "kecamatan": "'.$data_admin[$i]['kec'].'", "kabupaten": "'.$data_admin[$i]['kab'].'", "provinsi": "'.$data_admin[$i]['prop'].'"},"geometry": '.$data_admin[$i]['st_asgeojson'].'};
        var geojsonLayer'.$i.' = L.geoJson(geojson'.$i.', {
            // And link up the function to run when loading each feature
            onEachFeature: onEachFeature,
            style: myStyle
        }).addTo(map);

        layercontrol.addOverlay(geojsonLayer'.$i.', "'.$data_admin[$i]['kec'].'");

        var textLatLng = ['.$data_admin[$i]['st_y'].', '.$data_admin[$i]['st_x'].'];  
        var Label = L.marker(textLatLng, {
            icon: L.divIcon({
                className: "text-labels",   // Set class for CSS styling
                html: "'.$data_admin[$i]['kec'].'"
            }),
            draggable: true,       // Allow label dragging...?
            zIndexOffset: 1000     // Make appear above other map features
        });
        map.addLayer(Label);

    ';
}

$this->registerJs($script, \yii\web\View::POS_END); ?>