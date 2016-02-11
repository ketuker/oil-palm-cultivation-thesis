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
            [['title', 'description', 'data','data_rain','data_temp', 'data_dm', 'data_slope', 'data_text', 'data_elev', 'data_thick', 'data_thick', 'data_ripe', 'data_road', 'data_mills', 'data_town', 'geom'], 'string'],
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
            'title' => Yii::t('app','Title'),
            'description' => Yii::t('app','Description'),
            'dates' => Yii::t('app','Dates'),
            'id_user' => 'Id User',
            'data' => 'Data',
            'data_rain' => 'Data Rain',
            'data_temp' => 'Data Temperature',
            'data_dm' => 'Data Dry Month',
            'data_slope' => 'Data Slope',
            'data_text' => 'Data Texture',
            'data_elev' => 'Data Elevation',
            'data_thick' => 'Data Peat Thickness',
            'data_ripe' => 'Data Peat Ripening',
            'data_road' => 'Data Distance From Road',
            'data_mills' => 'Data Distance From Mills',
            'data_town' => 'Data Distance From Town',
            'st_area' => 'St Area',
            'geom' => 'Geom',
        ];
    }
}
