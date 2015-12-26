<?php

namespace app\widgets;

use Yii;
use yii\web\View;
use app\widgets\AssetBundle;

class KetukerMapAssets extends AssetBundle
{
    public function init()
    {
        $this->jsOptions['position'] = View::POS_END;

        $this->setSourcePath('@app/widgets/assets');

        $this->setupAssets('css', [
            'css/Map/leaflet',
            'css/Map/L.Control.OpenCageData.Search.min',
            'css/Map/easyPrint',
            'css/Map/leaflet.fullscreen',
            'css/Map/opencage',
            'css/Map/minimap',
            'css/Map/measure',
            //'css/MarkerCluster',
            //'css/MarkerCluster.Default'
            //'css/sidebar',
        ]);

        $this->setupAssets('js', [
            'js/Map/leaflet',
            'js/Map/leaflet-src',
            'js/Map/Leaflet-fullscreen',
            'js/Map/geocoder',
            'js/Map/geocoder.min',
            'js/Map/jQuery.print',
            'js/Map/leaflet.easyPrint',
            'js/Map/utf',
            'js/Map/minimap',
            'js/Map/measure',
            'js/Map/base',
        ]);

        parent::init();
    }
}