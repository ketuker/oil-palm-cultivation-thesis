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
            [['title', 'description', 'image'], 'string'],
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
            'id_category' => 'Id Category',
            'title' => 'Title',
            'description' => 'Description',
            'image' => 'Image',
            'date' => 'Date',
        ];
    }
}
