<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $title
 * @property int $count
 * @property int $cost
 * @property int $category_id
 * @property int $status
 * @property string $size
 * @property string $description
 * @property string|null $item_name
 * @property UploadedFile $image
 * @property string|null $image_path
 *
 * @property Category $category
 * @property Photo[] $photos
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @property UploadedFile $image
     */
    public $image;

    /**
     * @property string|null $image_path
     */
    public $image_path;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'category_id', 'item_name'], 'required'],
            [['count', 'cost', 'category_id'], 'integer'],
            [['title', 'item_name'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 1000],
            [['size'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg, jpeg'],
            [['image_path'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'count' => 'Count',
            'cost' => 'Cost',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Photos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhotos()
    {
        return $this->hasMany(Photo::class, ['product_id' => 'id']);
    }

    public function upload()
    {
        if ($this->validate()) {
            $filePath = 'uploads/' . $this->image->baseName . '.' . $this->image->extension;
            if ($this->image->saveAs($filePath)) {
                return $filePath;
            }
        }
        return false;
    }

    public function savePhoto($fileName)
    {
        $photo = new Photo();
        $photo->product_id = $this->id;
        $photo->file_name = $fileName;
        return $photo->save();
    }
}
