<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "land_average_geometric".
 *
 * @property integer $id
 * @property double $text_slope
 * @property double $text_thick
 * @property double $text_ripe
 * @property double $slope_thick
 * @property double $slope_ripe
 * @property double $thick_ripe
 * @property double $bobot_text
 * @property double $bobot_slope
 * @property double $bobot_thick
 * @property double $bobot_ripe
 * @property double $cr
 * @property string $date
 * @property integer $sum_land_datas
 * @property string $note
 */
class LandAG extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'land_average_geometric';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text_slope', 'text_thick', 'text_ripe', 'slope_thick', 'slope_ripe', 'thick_ripe', 'bobot_text', 'bobot_slope', 'bobot_thick', 'bobot_ripe', 'cr'], 'number'],
            [['date'], 'safe'],
            [['sum_land_datas'], 'integer'],
            [['note'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text_slope' => 'Text Slope',
            'text_thick' => 'Text Thick',
            'text_ripe' => 'Text Ripe',
            'slope_thick' => 'Slope Thick',
            'slope_ripe' => 'Slope Ripe',
            'thick_ripe' => 'Thick Ripe',
            'bobot_text' => 'Bobot Text',
            'bobot_slope' => 'Bobot Slope',
            'bobot_thick' => 'Bobot Thick',
            'bobot_ripe' => 'Bobot Ripe',
            'cr' => 'Cr',
            'date' => 'Date',
            'sum_land_datas' => 'Sum Land Datas',
            'note' => 'Note',
        ];
    }
}
