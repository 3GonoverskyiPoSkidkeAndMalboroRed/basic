<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

/**
 * Feedback model
 *
 * @property int $id
 * @property int $user_id
 * @property string $message
 * @property string $image
 * @property string $created_at
 */
class Feedback extends ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'message'], 'required'],
            [['user_id'], 'integer'],
            [['message'], 'string'],
            [['created_at'], 'safe'],
            [['image'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Пользователь',
            'message' => 'Сообщение',
            'image' => 'Изображение',
            'imageFile' => 'Загрузить изображение',
            'created_at' => 'Дата создания',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * Загружает изображение
     * @return bool успешность операции
     */
    public function upload()
    {
        if ($this->validate()) {
            if ($this->imageFile) {
                $fileName = 'feedback_' . time() . '.' . $this->imageFile->extension;
                $this->imageFile->saveAs('uploads/' . $fileName);
                $this->image = $fileName;
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * Отправляет уведомление администратору
     * @return bool успешность операции
     */
    public function sendNotification()
    {
        // Получаем пользователя
        $user = $this->user;

        // Отправляем email администратору
        return Yii::$app->mailer->compose()
            ->setTo(Yii::$app->params['adminEmail'])
            ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
            ->setReplyTo([$user->email => $user->full_name])
            ->setSubject('Новое сообщение обратной связи')
            ->setTextBody($this->message)
            ->send();
    }
}
