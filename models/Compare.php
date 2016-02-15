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
 * @property string $data_rain
 * @property string $data_temp
 * @property string $data_dm
 * @property string $data_slope
 * @property string $data_text
 * @property string $data_elev
 * @property string $data_thick
 * @property string $data_ripe
 * @property string $data_road
 * @property string $data_mills
 * @property string $data_town
 *
 * @property User $idUser
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
            [['title', 'description', 'data', 'geom', 'data_rain', 'data_temp', 'data_dm', 'data_slope', 'data_text', 'data_elev', 'data_thick', 'data_ripe', 'data_road', 'data_mills', 'data_town'], 'string'],
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
            'data_rain' => 'Data Rain',
            'data_temp' => 'Data Temp',
            'data_dm' => 'Data Dm',
            'data_slope' => 'Data Slope',
            'data_text' => 'Data Text',
            'data_elev' => 'Data Elev',
            'data_thick' => 'Data Thick',
            'data_ripe' => 'Data Ripe',
            'data_road' => 'Data Road',
            'data_mills' => 'Data Mills',
            'data_town' => 'Data Town',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
