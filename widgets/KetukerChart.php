<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\widgets;

use Yii;
use yii\web\View;
use app\widgets\AssetBundle;

/**
 * KetukerIntersects
 *  :
 *
 * How to use:
 * <?= app\widget\KetukerIntersects::widget();?>
 *
 * or Call with assign params
 * <?= app\widget\KetukerIntersects::widget([
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
class KetukerChart extends \yii\base\Widget
{
    public $options = [];

    public function run()
    {
        if(empty($this->options['width'])){
            $this->options['width'] = '50';
        }
        if (empty($this->options['height'])) {
            $this->options['height'] = '60';
        }
        echo "<div id='canvas-holder'> 
        <canvas id='chart-area' style='width: ".$this->options['width']."%; height: ".$this->options['height']."px;'/>
        </div>";
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

        $options ="
            var doughnutData = ".$this->options['data'].";

            window.onload = function(){
                var ctx = document.getElementById('chart-area').getContext('2d');
                window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, {responsive : true});
            };
        ";

        $view = $this->getView();

        $view->registerJs($options,View::POS_HEAD);

        KetukerChartAssets::register($view);
    }
}
