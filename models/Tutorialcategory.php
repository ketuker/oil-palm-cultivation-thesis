<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tutorial_category".
 *
 * @property integer $id
 * @property string $category
 *
 * @property Tutorial[] $tutorials
 */
class Tutorialcategory extends \yii\db\ActiveRecord
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
            'category' => 'Category',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTutorials()
    {
        return $this->hasMany(Tutorial::className(), ['id_category' => 'id']);
    }
}
