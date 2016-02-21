<?php

namespace app\models;

use Yii;
use dektrium\user\models\User;


/**
 * This is the model class for table "landnpeat".
 *
 * @property integer $id
 * @property double $slope_text
 * @property double $slope_elev
 * @property double $text_elev
 * @property double $bobot_slope
 * @property double $bobot_text
 * @property double $bobot_elev
 * @property double $cr
 * @property boolean $validation
 * @property string $id_user
 * @property string $date
 */
class Landnpeat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'landnpeat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slope_text', 'slope_elev', 'text_elev', 'bobot_slope', 'bobot_text', 'bobot_elev', 'cr'], 'required'],
            [['slope_text', 'slope_elev', 'text_elev', 'bobot_slope', 'bobot_text', 'bobot_elev', 'cr'], 'number'],
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
            'slope_text' => 'Slope Text',
            'slope_elev' => 'Slope Elev',
            'text_elev' => 'Text Elev',
            'bobot_slope' => Yii::t('app','Slope Weight'),
            'bobot_text' => Yii::t('app','Texture Weight'),
            'bobot_elev' => Yii::t('app','Elevation Weight'),
            'cr' => Yii::t('app','Consistency Ratio'),
            'validation' => Yii::t('app','Validation'),
            'id_user' => 'Id User',
            'date' => Yii::t('app','Date'),
        ];
    }
    public function getUser()

    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
