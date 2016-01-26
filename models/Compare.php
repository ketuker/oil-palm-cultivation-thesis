<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aoi_compare".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $dates
 * @property integer $id_user
 * @property string $data
 * @property double $st_area
 * @property string $geom
 */
class Compare extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aoi_compare';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'geom'], 'required'],
            [['title', 'description', 'data', 'geom'], 'string'],
            [['dates'], 'safe'],
            [['id_user'], 'integer'],
            [['st_area'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'dates' => 'Dates',
            'id_user' => 'Id User',
            'data' => 'Data',
            'st_area' => 'St Area',
            'geom' => 'Geom',
        ];
    }
}
