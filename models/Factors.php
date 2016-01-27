<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "factors".
 *
 * @property integer $id
 * @property double $climate_land
 * @property double $climate_accessibility
 * @property double $land_accessibility
 * @property double $bobot_climate
 * @property double $bobot_land
 * @property double $bobot_accessibility
 * @property double $cr
 * @property boolean $validation
 * @property integer $id_user
 * @property string $date
 */
class Factors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'factors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['climate_land', 'climate_accessibility', 'land_accessibility', 'bobot_climate', 'bobot_land', 'bobot_accessibility', 'cr'], 'number'],
            [['validation'], 'boolean'],
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
            'climate_land' => 'Climate Land',
            'climate_accessibility' => 'Climate Accessibility',
            'land_accessibility' => 'Land Accessibility',
            'bobot_climate' => 'Bobot Climate',
            'bobot_land' => 'Bobot Land',
            'bobot_accessibility' => 'Bobot Accessibility',
            'cr' => 'Cr',
            'validation' => 'Validation',
            'id_user' => 'Id User',
            'date' => 'Date',
        ];
    }
}
