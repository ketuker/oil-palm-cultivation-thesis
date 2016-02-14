<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "landpeat_average_geometry".
 *
 * @property integer $id
 * @property double $slope_thick
 * @property double $slope_ripe
 * @property double $thick_ripe
 * @property double $bobot_slope
 * @property double $bobot_thick
 * @property double $bobot_ripe
 * @property double $cr
 * @property string $date
 * @property integer $sum_landpeat_datas
 * @property string $note
 */
class LandpeatAG extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'landpeat_average_geometry';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slope_thick', 'slope_ripe', 'thick_ripe', 'bobot_slope', 'bobot_thick', 'bobot_ripe', 'cr'], 'number'],
            [['date'], 'safe'],
            [['sum_landpeat_datas'], 'integer'],
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
            'slope_thick' => 'Slope Thick',
            'slope_ripe' => 'Slope Ripe',
            'thick_ripe' => 'Thick Ripe',
            'bobot_slope' => 'Bobot Slope',
            'bobot_thick' => 'Bobot Thick',
            'bobot_ripe' => 'Bobot Ripe',
            'cr' => 'Cr',
            'date' => 'Date',
            'sum_landpeat_datas' => 'Sum Landpeat Datas',
            'note' => 'Note',
        ];
    }
}
