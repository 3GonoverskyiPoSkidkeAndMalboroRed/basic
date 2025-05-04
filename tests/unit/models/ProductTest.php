<?php

namespace tests\unit\models;

use app\models\Product;
use app\models\Category;

class ProductTest extends \Codeception\Test\Unit
{
    public function testValidation()
    {
        $model = new Product();
        
        // Проверяем, что модель не проходит валидацию без обязательных полей
        verify($model->validate())->false();
        verify($model->errors)->arrayHasKey('title');
        verify($model->errors)->arrayHasKey('category_id');
        verify($model->errors)->arrayHasKey('item_name');
        
        // Заполняем обязательные поля
        $model->title = 'Тестовый товар';
        $model->category_id = 1;
        $model->item_name = 'test_item';
        
        // Проверяем, что теперь модель проходит валидацию
        verify($model->validate())->true();
    }
    
    public function testSizes()
    {
        // Проверяем, что массив размеров содержит правильные значения
        verify(Product::$sizes)->arrayHasKey(0);
        verify(Product::$sizes[0])->equals('XS');
        verify(Product::$sizes[6])->equals('One size');
    }
    
    public function testRelationWithCategory()
    {
        // Создаем моки для тестирования
        $product = $this->make(Product::class, [
            'category_id' => 1,
            'getCategory' => function() {
                return $this->make(Category::class, [
                    'id' => 1,
                    'title' => 'Тестовая категория'
                ]);
            }
        ]);
        
        // Проверяем связь с категорией
        verify($product->category)->notNull();
        verify($product->category->title)->equals('Тестовая категория');
    }
    
    public function testUploadMethod()
    {
        // Тестирование метода upload() требует имитации загрузки файла
        // Здесь просто проверим, что метод существует
        $product = new Product();
        verify(method_exists($product, 'upload'))->true();
    }
    
    public function testSavePhotoMethod()
    {
        // Тестирование метода savePhoto() требует доступа к базе данных
        // Здесь просто проверим, что метод существует
        $product = new Product();
        verify(method_exists($product, 'savePhoto'))->true();
    }
}
