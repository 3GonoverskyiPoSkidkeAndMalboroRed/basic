<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $created_at
 * @property UploadedFile $image
 * @property string $image_path
 */
class News extends \yii\db\ActiveRecord
{
    public $image; // Для загрузки изображения
    public $image_path; // Для хранения пути к изображению

    public static function tableName()
    {
        return 'news';
    }

    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['content'], 'string'],
            [['created_at'], 'safe'],
            [['image'], 'file', 'extensions' => 'png, jpg, jpeg'],
            [['image_path'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'content' => 'Содержимое',
            'created_at' => 'Дата создания',
            'image' => 'Изображение',
        ];
    }

    public function upload()
    {
        if ($this->validate() && $this->image) {
            $filePath = 'uploads/news/' . $this->image->baseName . '.' . $this->image->extension;
            if ($this->image->saveAs($filePath)) {
                $this->image_path = $filePath; // Сохраняем путь к изображению
                return true;
            }
        }
        return false;
    }
} 