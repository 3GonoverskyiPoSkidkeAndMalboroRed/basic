<?php

namespace app\models;

use yii\db\ActiveRecord;

class Order extends ActiveRecord
{

    public function rules()
    {
        return [
            [['user_id', 'product_id', 'status_id', 'contact_number'], 'required'],
            [['user_id', 'product_id', 'status_id'], 'integer'],
            [['contact_number'], 'string', 'max' => 50],
            // Другие правила валидации
        ];
    }

    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }

    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'status_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
