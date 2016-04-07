<?php

use yii\helpers\Url;
use yii\helpers\Html;  

$this->title = 'My Yii Application';
?>
<style type="text/css">
.text-labels {
    font-size: 10px;
    font-weight: bold;
    color: white;
}
</style>
<h2 style="margin-top:0px;"><center><?= Yii::t('app','Welcome to Web GIS Application');?></br> <?= Yii::t('app','for Selecting Oil Palm Plantation Site');?></center></h2>
<div class="site-index">
        <div class="col-md-7">
            <?= app\widgets\KetukerIntersects::widget([
                'options' => [
                    'library-js' => 'leaflet',
                    'width' => '100',
                    'height' => '510',
                    'setView' => '-2, 125',
                    'setZoom' => '4',
                    'column' => 'compare-geom'
                ]
            ]);?>
        </div>

        <div class="col-md-5">
        <h3><?= Yii::t('app','Kutai Kertanegara Regency');?></h3> </br>
<?= Yii::t('app','Kutai Kartanegara Regency is a regency in East Kalimantan Province, Indonesia. Regency has an area of 27,263.10 km² and the area waters approximately 4,097 km² which is divided in 18 districts and 225 villages, with a population reaching 540,994 people (2007) with population growth of 2.73%. Regency is geographically located between 1°18′40″S and 116°31′36″E. ');?>
</br></br></br></br>
<?= Yii::t('app','For more details please read the');?>

<?=
Html::a(Yii::t('app','documentation'), ["/../web/documentation"]);

?>


        </div>

</div>

<?php

$script = '
	/* Fit Bounds */
    var bbox_geojson 		= '.$bbox_geojson.';
    var bbox_geojson_all 	= L.geoJson(bbox_geojson);
    map.fitBounds(bbox_geojson_all.getBounds());
';
// print_r($data_admin);
// die;
for ($i=0; $i < count($data_admin); $i++) { 
    $script .= '

        var myStyle = {
            "color": "#ff0023",
            "weight": 2,
            "opacity": 0.65
        };

        var onEachFeature = function(feature, layer) {
            layer.on("click", function (e) {
            var popup = L.popup()
                    .setLatLng(e.latlng)
                    .setContent("Kecamatan : "+feature.properties.kecamatan)
                    .openOn(map);
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