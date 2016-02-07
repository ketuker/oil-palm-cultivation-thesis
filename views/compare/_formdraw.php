<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Compare */
/* @var $form yii\widgets\ActiveForm */
?>
<style type="text/css">
.text-labels {
    font-size: small;
    font-weight: bold;
    color: white;
}
</style>
<div class="compare-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-5">
            <?= $form->field($model, 'title')->textInput() ?>

            <?= $form->field($model, 'description')->textArea(['rows' => '10']) ?>

            <?= $form->field($model, 'geom')->HiddenInput()->label('') ?>
        </div>
        <div class="col-md-7">
            <?= app\widgets\KetukerIntersects::widget([
                'options' => [
                    'library-js' => 'leaflet',
                    'width' => '100',
                    'height' => '310',
                    'setView' => '-2, 125',
                    'setZoom' => '4',
                    'column' => 'compare-geom'
                ]
            ]);?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create Comparison' : 'Update Comparison', ['class' => $model->isNewRecord ? 'btn btn-success pull-right' : 'btn btn-primary pull-right']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

$script = '
    /* Fit Bounds */
    var bbox_geojson        = '.$bbox_geojson.';
    var bbox_geojson_all    = L.geoJson(bbox_geojson);
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
                var popup = L.popup()
                    .setLatLng(e.latlng)
                    .setContent(feature.properties.kecamatan)
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