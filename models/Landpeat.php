<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "landpeat".
 *
 * @property integer $id
 * @property double $slope_thick
 * @property double $slope_ripe
 * @property double $thick_ripe
 * @property double $bobot_slope
 * @property double $bobot_thick
 * @property double $bobot_ripe
 * @property double $cr
 * @property boolean $validation
 * @property integer $id_user
 * @property string $date
 */
class Landpeat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'landpeat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slope_thick', 'slope_ripe', 'thick_ripe', 'bobot_slope', 'bobot_thick', 'bobot_ripe', 'cr', 'id_user'], 'required'],
            [['slope_thick', 'slope_ripe', 'thick_ripe', 'bobot_slope', 'bobot_thick', 'bobot_ripe', 'cr'], 'number'],
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
            'slope_thick' => 'Slope Thick',
            'slope_ripe' => 'Slope Ripe',
            'thick_ripe' => 'Thick Ripe',
            'bobot_slope' => 'Bobot Slope',
            'bobot_thick' => 'Bobot Thick',
            'bobot_ripe' => 'Bobot Ripe',
            'cr' => 'Cr',
            'validation' => 'Validation',
            'id_user' => 'Id User',
            'date' => 'Date',
        ];
    }
}
