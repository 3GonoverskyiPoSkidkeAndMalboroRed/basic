<?php

namespace app\models;

use yii\db\ActiveRecord;

class Music extends ActiveRecord
{
    public static function tableName()
    {
        return 'music';
    }

    public function rules()
    {
        return [
            [['title', 'youtube_link'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['youtube_link'], 'string', 'max' => 255],
            [['youtube_link'], 'url'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'youtube_link' => 'Ссылка на YouTube',
        ];
    }
} 