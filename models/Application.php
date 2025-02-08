<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "application".
 *
 * @property int $id
 * @property string $address
 * @property string $phone
 * @property string $created_at
 * @property string $date
 * @property string $time
 * @property string|null $other
 * @property int|null $service_id
 * @property int $pay_type_id
 * @property int $status_id
 * @property int $user_id
 *
 * @property PayType $payType
 * @property Service $service
 * @property Status $status
 * @property User $user
 */
class Application extends \yii\db\ActiveRecord
{

    const SCENARIO_SERVICE = 'service';
    const SCENARIO_CANCEL = 'cancel';


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'application';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address', 'phone', 'date', 'time', 'pay_type_id', 'status_id', 'user_id'], 'required'],
            [['created_at', 'date', 'time'], 'safe'],
            [['service_id', 'pay_type_id', 'status_id', 'user_id'], 'integer'],
            [['address', 'phone', 'other', 'reason'], 'string', 'max' => 255],
            [['pay_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => PayType::class, 'targetAttribute' => ['pay_type_id' => 'id']],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Service::class, 'targetAttribute' => ['service_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['status_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            ['phone', 'match', 'pattern' => '/^\+7\([\d]{3}\)-[\d]{3}-[\d]{2}-[\d]{2}$/', 'message' => 'Телефон в формате +7(XXX)-XXX-XX-XX'],
            ['service_id', 'required', 'on' => self::SCENARIO_SERVICE],
            ['reason', 'required', 'on' => self::SCENARIO_CANCEL],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№ заявки',
            'address' => 'Адрес',
            'phone' => 'Телефон',
            'created_at' => 'Время создания',
            'date' => 'Дата получения услуги',
            'time' => 'Время получения услуги',
            'other' => 'Иная услуга',
            'service_id' => 'Услуга',
            'pay_type_id' => 'Тип оплаты',
            'status_id' => 'Статус',
            'user_id' => 'Клиент',
        ];
    }

    /**
     * Gets query for [[PayType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayType()
    {
        return $this->hasOne(PayType::class, ['id' => 'pay_type_id']);
    }

    /**
     * Gets query for [[Service]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Service::class, ['id' => 'service_id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'status_id']);
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
}
