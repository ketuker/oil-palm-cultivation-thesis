<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tutorial_category".
 *
 * @property integer $id
 * @property string $category
 */
class TutorialCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tutorial_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category'], 'required'],
            [['category'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => Yii::t('app','Category'),
        ];
    }
}
