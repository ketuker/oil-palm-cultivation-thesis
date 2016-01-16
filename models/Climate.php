<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "climate".
 *
 * @property integer $id
 * @property double $ch_temp
 * @property double $ch_dm
 * @property double $temp_dm
 * @property double $bobot_ch
 * @property double $boobt_temp
 * @property double $bobot_dm
 * @property double $cr
 * @property boolean $validation
 * @property integer $id_user
 * @property string $date
 */
class Climate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'climate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ch_temp', 'ch_dm', 'temp_dm', 'bobot_ch', 'boobt_temp', 'bobot_dm', 'cr'], 'required'],
            [['ch_temp', 'ch_dm', 'temp_dm', 'bobot_ch', 'boobt_temp', 'bobot_dm', 'cr'], 'number'],
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
            'ch_temp' => 'Ch Temp',
            'ch_dm' => 'Ch Dm',
            'temp_dm' => 'Temp Dm',
            'bobot_ch' => 'Bobot Ch',
            'boobt_temp' => 'Boobt Temp',
            'bobot_dm' => 'Bobot Dm',
            'cr' => 'Cr',
            'validation' => 'Validation',
            'id_user' => 'Id User',
            'date' => 'Date',
        ];
    }
}
