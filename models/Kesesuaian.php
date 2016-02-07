<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kesesuaian".
 *
 * @property integer $gid
 * @property integer $climate_temp
 * @property integer $climate_dm
 * @property integer $land_texture
 * @property integer $land_peat_thickness
 * @property integer $land_peat_ripening
 * @property integer $accessibility_distance_from_town
 * @property integer $constraint_kawasan_hutan
 * @property integer $constraint_sungai
 * @property integer $constraint_pemukiman
 * @property integer $constraint_pipib
 * @property integer $climate_ch
 * @property integer $accessibility_distance_from_road
 * @property integer $accessibility_distance_from_mills
 * @property integer $land_slope
 * @property string $the_geom
 */
class Kesesuaian extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kesesuaian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['climate_temp', 'climate_dm', 'land_texture', 'land_peat_thickness', 'land_peat_ripening', 'accessibility_distance_from_town', 'constraint_kawasan_hutan', 'constraint_sungai', 'constraint_pemukiman', 'constraint_pipib', 'climate_ch', 'accessibility_distance_from_road', 'accessibility_distance_from_mills', 'land_slope'], 'integer'],
            [['the_geom'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'gid' => 'Gid',
            'climate_temp' => 'Climate Temp',
            'climate_dm' => 'Climate Dm',
            'land_texture' => 'Land Texture',
            'land_peat_thickness' => 'Land Peat Thickness',
            'land_peat_ripening' => 'Land Peat Ripening',
            'accessibility_distance_from_town' => 'Accessibility Distance From Town',
            'constraint_kawasan_hutan' => 'Constraint Kawasan Hutan',
            'constraint_sungai' => 'Constraint Sungai',
            'constraint_pemukiman' => 'Constraint Pemukiman',
            'constraint_pipib' => 'Constraint Pipib',
            'climate_ch' => 'Climate Ch',
            'accessibility_distance_from_road' => 'Accessibility Distance From Road',
            'accessibility_distance_from_mills' => 'Accessibility Distance From Mills',
            'land_slope' => 'Land Slope',
            'the_geom' => 'The Geom',
        ];
    }
}
