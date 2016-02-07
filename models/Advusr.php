<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "advusr".
 *
 * @property integer $id
 * @property string $skenario
 * @property double $ch_temp
 * @property double $ch_dm
 * @property double $temp_dm
 * @property double $bobot_ch
 * @property double $bobot_temp
 * @property double $bobot_dm
 * @property double $cr_climate
 * @property boolean $validation_climate
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
 * @property double $cr_land
 * @property boolean $validation_land
 * @property double $road_mills
 * @property double $road_town
 * @property double $mills_town
 * @property double $bobot_road
 * @property double $bobot_mills
 * @property double $bobot_town
 * @property double $cr_accessibility
 * @property boolean $validation_accessibility
 * @property double $climate_land
 * @property double $climate_accessibility
 * @property double $land_accessibility
 * @property double $bobot_climate
 * @property double $bobot_land
 * @property double $bobot_accessibility
 * @property double $cr_factors
 * @property boolean $validation
 * @property integer $id_user
 * @property string $date
 */
class Advusr extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'advusr';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['skenario', 'ch_temp', 'ch_dm', 'temp_dm', 'bobot_ch', 'bobot_temp', 'bobot_dm', 'cr_climate', 'validation_climate', 'text_slope', 'text_thick', 'text_ripe', 'slope_thick', 'slope_ripe', 'thick_ripe', 'bobot_text', 'bobot_slope', 'bobot_thick', 'bobot_ripe', 'cr_land', 'validation_land', 'road_mills', 'road_town', 'mills_town', 'bobot_road', 'bobot_mills', 'bobot_town', 'cr_accessibility', 'validation_accessibility', 'climate_land', 'climate_accessibility', 'land_accessibility', 'bobot_climate', 'bobot_land', 'bobot_accessibility', 'cr_factors', 'validation'], 'required'],
            [['skenario'], 'string'],
            [['ch_temp', 'ch_dm', 'temp_dm', 'bobot_ch', 'bobot_temp', 'bobot_dm', 'cr_climate', 'text_slope', 'text_thick', 'text_ripe', 'slope_thick', 'slope_ripe', 'thick_ripe', 'bobot_text', 'bobot_slope', 'bobot_thick', 'bobot_ripe', 'cr_land', 'road_mills', 'road_town', 'mills_town', 'bobot_road', 'bobot_mills', 'bobot_town', 'cr_accessibility', 'climate_land', 'climate_accessibility', 'land_accessibility', 'bobot_climate', 'bobot_land', 'bobot_accessibility', 'cr_factors'], 'number'],
            [['validation_climate', 'validation_land', 'validation_accessibility', 'validation'], 'boolean'],
            [['id_user'], 'integer'],
            [['date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'skenario' => 'Nama Skenario',
            'ch_temp' => 'Ch Temp',
            'ch_dm' => 'Ch Dm',
            'temp_dm' => 'Temp Dm',
            'bobot_ch' => 'Bobot Ch',
            'bobot_temp' => 'Bobot Temp',
            'bobot_dm' => 'Bobot Dm',
            'cr_climate' => 'Cr Climate',
            'validation_climate' => 'Validation Climate',
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
            'cr_land' => 'Cr Land',
            'validation_land' => 'Validation Land',
            'road_mills' => 'Road Mills',
            'road_town' => 'Road Town',
            'mills_town' => 'Mills Town',
            'bobot_road' => 'Bobot Road',
            'bobot_mills' => 'Bobot Mills',
            'bobot_town' => 'Bobot Town',
            'cr_accessibility' => 'Cr Accessibility',
            'validation_accessibility' => 'Validation Accessibility',
            'climate_land' => 'Climate Land',
            'climate_accessibility' => 'Climate Accessibility',
            'land_accessibility' => 'Land Accessibility',
            'bobot_climate' => 'Bobot Climate',
            'bobot_land' => 'Bobot Land',
            'bobot_accessibility' => 'Bobot Accessibility',
            'cr_factors' => 'Cr Factors',
            'validation' => 'Validation',
            'id_user' => 'Id User',
            'date' => 'Date',
        ];
    }
}
