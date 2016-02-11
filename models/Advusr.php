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
 * @property double $slope_text
 * @property double $slope_elev
 * @property double $text_elev
 * @property double $bobot_slopenp
 * @property double $bobot_text
 * @property double $bobot_elev
 * @property double $cr_landnpeat
 * @property boolean $validation_landnpeat
 * @property double $slope_thick
 * @property double $slope_ripe
 * @property double $thick_ripe
 * @property double $bobot_slopep
 * @property double $bobot_thick
 * @property double $bobot_ripe
 * @property double $cr_landpeat
 * @property boolean $validation_landpeat
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
 * @property boolean $validation_factors
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
            [['skenario', 'ch_temp', 'ch_dm', 'temp_dm', 'bobot_ch', 'bobot_temp', 'bobot_dm', 'cr_climate', 'validation_climate', 'slope_text', 'slope_elev', 'text_elev', 'bobot_slopenp', 'bobot_text', 'bobot_elev', 'cr_landnpeat', 'validation_landnpeat', 'slope_thick', 'slope_ripe', 'thick_ripe', 'bobot_slopep', 'bobot_thick', 'bobot_ripe', 'cr_landpeat', 'validation_landpeat', 'road_mills', 'road_town', 'mills_town', 'bobot_road', 'bobot_mills', 'bobot_town', 'cr_accessibility', 'validation_accessibility', 'climate_land', 'climate_accessibility', 'land_accessibility', 'bobot_climate', 'bobot_land', 'bobot_accessibility', 'cr_factors', 'validation_factors'], 'required'],
            [['skenario'], 'string'],
            [['ch_temp', 'ch_dm', 'temp_dm', 'bobot_ch', 'bobot_temp', 'bobot_dm', 'cr_climate', 'slope_text', 'slope_elev', 'text_elev', 'bobot_slopenp', 'bobot_text', 'bobot_elev', 'cr_landnpeat', 'slope_thick', 'slope_ripe', 'thick_ripe', 'bobot_slopep', 'bobot_thick', 'bobot_ripe', 'cr_landpeat', 'road_mills', 'road_town', 'mills_town', 'bobot_road', 'bobot_mills', 'bobot_town', 'cr_accessibility', 'climate_land', 'climate_accessibility', 'land_accessibility', 'bobot_climate', 'bobot_land', 'bobot_accessibility', 'cr_factors'], 'number'],
            [['validation_climate', 'validation_landnpeat', 'validation_landpeat', 'validation_accessibility', 'validation_factors'], 'boolean'],
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
            'skenario' => 'Skenario',
            'ch_temp' => 'Ch Temp',
            'ch_dm' => 'Ch Dm',
            'temp_dm' => 'Temp Dm',
            'bobot_ch' => Yii::t('app','Rainfall Weight'),
            'bobot_temp' => Yii::t('app','Temperature Weight'),
            'bobot_dm' => Yii::t('app','Dry Month Weight'),
            'cr_climate' => Yii::t('app','Climate Consistency Ratio'),
            'validation_climate' => 'Validation Climate',
            'slope_text' => 'Slope Text',
            'slope_elev' => 'Slope Elev',
            'text_elev' => 'Text Elev',
            'bobot_slopenp' => Yii::t('app','Slope Weight'),
            'bobot_text' => Yii::t('app','Texture Weight'),
            'bobot_elev' => Yii::t('app','Elevation Weight'),
            'cr_landnpeat' => Yii::t('app','Non Peat Land Consistency Ratio'),
            'validation_landnpeat' => 'Validation Landnpeat',
            'slope_thick' => 'Slope Thick',
            'slope_ripe' => 'Slope Ripe',
            'thick_ripe' => 'Thick Ripe',
            'bobot_slopep' => Yii::t('app','Slope Weight'),
            'bobot_thick' => Yii::t('app','Peat Thickness Weight'),
            'bobot_ripe' => Yii::t('app','Peat Ripening Weight'),
            'cr_landpeat' => Yii::t('app','Peat Land Consistency Ratio'),
            'validation_landpeat' => 'Validation Landpeat',
            'road_mills' => 'Road Mills',
            'road_town' => 'Road Town',
            'mills_town' => 'Mills Town',
            'bobot_road' => Yii::t('app','Road Weight'),
            'bobot_mills' => Yii::t('app','Mills Weight'),
            'bobot_town' => Yii::t('app','Town Weight'),
            'cr_accessibility' => Yii::t('app','Accessibility Consistency Ratio'),
            'validation_accessibility' => 'Validation Accessibility',
            'climate_land' => 'Climate Land',
            'climate_accessibility' => 'Climate Accessibility',
            'land_accessibility' => 'Land Accessibility',
            'bobot_climate' => Yii::t('app','Climate Weight'),
            'bobot_land' => Yii::t('app','Land Weight'),
            'bobot_accessibility' => Yii::t('app','Accessibility Weight'),
            'cr_factors' => Yii::t('app','Factors Consistency Ratio'),
            'validation_factors' => 'Validation Factors',
            'id_user' => 'Id User',
            'date' => Yii::t('app','Date'),
        ];
    }
}
