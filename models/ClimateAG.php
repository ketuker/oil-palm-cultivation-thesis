<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "climate_average_geometric".
 *
 * @property integer $id
 * @property double $ch_temp
 * @property double $ch_dm
 * @property double $temp_dm
 * @property double $bobot_ch
 * @property double $boobt_temp
 * @property double $bobot_dm
 * @property double $cr
 * @property string $date
 * @property integer $sum_climate_datas
 * @property string $note
 */
class ClimateAG extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'climate_average_geometric';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ch_temp', 'ch_dm', 'temp_dm', 'bobot_ch', 'boobt_temp', 'bobot_dm', 'cr'], 'number'],
            [['date'], 'safe'],
            [['sum_climate_datas'], 'integer'],
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
            'ch_temp' => 'Ch Temp',
            'ch_dm' => 'Ch Dm',
            'temp_dm' => 'Temp Dm',
            'bobot_ch' => 'Bobot Ch',
            'boobt_temp' => 'Boobt Temp',
            'bobot_dm' => 'Bobot Dm',
            'cr' => 'Cr',
            'date' => 'Date',
            'sum_climate_datas' => 'Sum Climate Datas',
            'note' => 'Note',
        ];
    }
}
