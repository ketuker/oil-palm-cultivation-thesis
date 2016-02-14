<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "landnpeat_average_geometry".
 *
 * @property integer $id
 * @property double $slope_text
 * @property double $slope_elev
 * @property double $text_elev
 * @property double $bobot_slope
 * @property double $bobot_text
 * @property double $bobot_elev
 * @property double $cr
 * @property string $date
 * @property integer $sum_landnpeat_datas
 * @property string $note
 */
class LandnpeatAG extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'landnpeat_average_geometry';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slope_text', 'slope_elev', 'text_elev', 'bobot_slope', 'bobot_text', 'bobot_elev', 'cr'], 'number'],
            [['date'], 'safe'],
            [['sum_landnpeat_datas'], 'integer'],
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
            'slope_text' => 'Slope Text',
            'slope_elev' => 'Slope Elev',
            'text_elev' => 'Text Elev',
            'bobot_slope' => 'Bobot Slope',
            'bobot_text' => 'Bobot Text',
            'bobot_elev' => 'Bobot Elev',
            'cr' => 'Cr',
            'date' => 'Date',
            'sum_landnpeat_datas' => 'Sum Landnpeat Datas',
            'note' => 'Note',
        ];
    }
}
