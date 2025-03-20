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

    public function getYoutubeId()
    {
        $url = $this->youtube_link;
        preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $url, $matches);
        return isset($matches[1]) ? $matches[1] : null;
    }

    public function getYoutubeThumbnail()
    {
        $youtubeId = $this->getYoutubeId();
        return $youtubeId ? "https://img.youtube.com/vi/{$youtubeId}/maxresdefault.jpg" : null;
    }
} 