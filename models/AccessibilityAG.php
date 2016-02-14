<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "accessibility_avarage_geometric".
 *
 * @property integer $id
 * @property double $road_mills
 * @property double $road_town
 * @property double $mills_town
 * @property double $bobot_road
 * @property double $bobot_mills
 * @property double $bobot_town
 * @property double $cr
 * @property string $date
 * @property integer $sum_access_datas
 * @property string $note
 */
class AccessibilityAG extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'accessibility_avarage_geometric';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['road_mills', 'road_town', 'mills_town', 'bobot_road', 'bobot_mills', 'bobot_town', 'cr'], 'number'],
            [['date'], 'safe'],
            [['sum_access_datas'], 'integer'],
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
            'road_mills' => 'Road Mills',
            'road_town' => 'Road Town',
            'mills_town' => 'Mills Town',
            'bobot_road' => 'Bobot Road',
            'bobot_mills' => 'Bobot Mills',
            'bobot_town' => 'Bobot Town',
            'cr' => 'Cr',
            'date' => 'Date',
            'sum_access_datas' => 'Sum Access Datas',
            'note' => 'Note',
        ];
    }
}
