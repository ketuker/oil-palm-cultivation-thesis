<?php

namespace app\models;

use Yii;
use dektrium\user\models\User;

/**
 * This is the model class for table "accessibility".
 *
 * @property integer $id
 * @property double $road_mills
 * @property double $road_town
 * @property double $mills_town
 * @property double $bobot_road
 * @property double $bobot_mills
 * @property double $bobot_town
 * @property double $cr
 * @property boolean $validation
 * @property integer $id_user
 * @property string $date
 */
class Accessibility extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'accessibility';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['road_mills', 'road_town', 'mills_town', 'bobot_road', 'bobot_mills', 'bobot_town', 'cr'], 'required'],
            [['road_mills', 'road_town', 'mills_town', 'bobot_road', 'bobot_mills', 'bobot_town', 'cr'], 'number'],
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
            'road_mills' => 'Road Mills',
            'road_town' => 'Road Town',
            'mills_town' => 'Mills Town',
            'bobot_road' => Yii::t('app','Road Weight'),
            'bobot_mills' => Yii::t('app','Mills Weight'),
            'bobot_town' => Yii::t('app','Town Weight'),
            'cr' => Yii::t('app','Consistency Ratio'),
            'validation' => Yii::t('app','Validation'),
            'id_user' => 'Id User',
            'date' => Yii::t('app','Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
