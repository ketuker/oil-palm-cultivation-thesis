<?php

namespace app\models;

use Yii;
use dektrium\user\models\User;


/**
 * This is the model class for table "landpeat".
 *
 * @property integer $id
 * @property double $slope_thick
 * @property double $slope_ripe
 * @property double $thick_ripe
 * @property double $bobot_slope
 * @property double $bobot_thick
 * @property double $bobot_ripe
 * @property double $cr
 * @property boolean $validation
 * @property integer $id_user
 * @property string $date
 */
class Landpeat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'landpeat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slope_thick', 'slope_ripe', 'thick_ripe', 'bobot_slope', 'bobot_thick', 'bobot_ripe', 'cr'], 'required'],
            [['slope_thick', 'slope_ripe', 'thick_ripe', 'bobot_slope', 'bobot_thick', 'bobot_ripe', 'cr'], 'number'],
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
            'slope_thick' => 'Slope Thick',
            'slope_ripe' => 'Slope Ripe',
            'thick_ripe' => 'Thick Ripe',
            'bobot_slope' => Yii::t('app','Slope Weight'),
            'bobot_thick' => Yii::t('app','Peat Thickness Weight'),
            'bobot_ripe' => Yii::t('app','Peat Ripening Weight'),
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
