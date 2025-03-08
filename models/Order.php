<?php

namespace app\models;

use yii\db\ActiveRecord;

class Order extends ActiveRecord
{
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }

    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'status_id']);
    }
}
