<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tutorial".
 *
 * @property integer $id
 * @property integer $id_category
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $date
 *
 * @property TutorialCategory $idCategory
 */
class Tutorial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tutorial';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_category', 'title', 'description'], 'required'],
            [['id_category'], 'integer'],
            [['title', 'description'], 'string'],
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
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
            'id_category' => 'Category',
            'title' => 'Title',
            'description' => 'Description',
            'image' => 'Image',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(TutorialCategory::className(), ['id' => 'id_category']);
    }

}
