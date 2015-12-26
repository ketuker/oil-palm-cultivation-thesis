<?php
/**
 * @link http://www.-.com/
 * @copyright Copyright (c) 2015 MIT
 * @license http://www.-.com/license/
 */

namespace app\widgets;

use Yii;
use yii\web\View;
use app\widgets\AssetBundle;

/**
 * KetukerMap
 *  :
 *
 * How to use:
 * <?= app\widgets\KetukerMap::widget();?>
 *
 * or Call with assign params
 * <?= app\widgets\KetukerMap::widget([
 *      'options' => [
 *          'library-js' => 'leaflet',
 *          'width' => '100',
 *          'height' => '350',
 *          'setView'=> '-2, 125',
 *          'setZoom'=> '4'
 *      ]
 *   ]);?>
 *
 * @author Ketuker <ketuker@gmail.com>
 * @author Roy <habib.sickh@gmail.com>
 */
class KetukerMap extends \yii\base\Widget
{
    public $options = [];

    public function run()
    {
        if(empty($this->options['width'])){
            $this->options['width'] = '100';
        }
        if (empty($this->options['height'])) {
            $this->options['height'] = '444';
        }
        echo "<div id='map' style='width: ".$this->options['width']."%; height: ".$this->options['height']."px;'></div>";
    }

    public function init()
    {
        $this->registerAssets();

        parent::init();
    }

    /**
     * Registers the needed assets
     */
    public function registerAssets()
    {

        if (empty($this->options['setView'])) {
            $this->options['setView'] = '-2, 117';
        }

        if (empty($this->options['setZoom'])) {
            $this->options['setZoom'] = '5';
        }

        $setView            = explode(",", $this->options['setView']);
        $zoom               = $this->options['setZoom'];
        $lat                = $setView[0];
        $lon                = $setView[1];

        $options ="
            var KetukerIntersects_lat   = $lat;
            var KetukerIntersects_lon   = $lon;
            var KetukerIntersects_zoom  = $zoom;
        ";

        $view = $this->getView();

        $view->registerJs($options,View::POS_HEAD);

        KetukerMapAssets::register($view);
    }
}
