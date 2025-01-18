<?php

namespace app\models;

use Yii;
use yii\base\Model;


class RegisterForm extends Model
{
    public string $login = '';
    public string $password = '';
    public string $full_name = '';
    public string $phone = '';
    public string $email = '';


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['login', 'password', 'full_name', 'phone', 'email'], 'required'],

            [['login', 'password', 'full_name', 'phone', 'email'], 'string', 'max' => 255],
           
            //!!!!!!!!!!!!!!ВАЛИДАТОРЫ!!!!!!!!!!!!!!
            // указан валидатор для Эл.почты
            ['email', 'email'],
            // указан валидатор мин. значения 6 для пароля
            ['password', 'string', 'min' => 6],
            // указан валидатор для ФИО на форму записи
            ['full_name', 'match', 'pattern' => '/^[а-яё\s]+$/ui', 'message' => 'Только символы кириллицы и пробелы'],
            // указан валидатор формы для Телефона \+7\([\d]{3}\)-[\d]{3}-[\d]{2}-[\d]{2}
            ['phone', 'match', 'pattern' => '/^\+7\([\d]{3}\)-[\d]{3}-[\d]{2}-[\d]{2}$/', 'message' => 'Телефон в формате  +7(ХХХ)-ХХХ-ХХ-ХХ '],
            // указан валидатор для поля Loging на  уникальность
            [['login'], 'unique', 'targetClass' => User::class],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'login' => 'Логин',
            'password'  => 'Пароль',
            'full_name'  => 'ФИО',
            'phone'  => 'Телефон',
            'email'  => 'Электронная почта',
        ];
    }

    public function userRegister(): false|object
    {
        if ($this->validate()){
            $user = new User();

            // $user =>login = $this=>login;


            $user->attributes = $this->attributes;
            // $user->load($this->attributes, '');


            $user->role_id = Role::getRoleId('user');
            $user->password = Yii::$app->security->generatePasswordHash
            ($user->password);
            $user->auth_key = Yii::$app->security->generateRandomString();

            if (! $user->save()) {
                Yii::debug($user->errors);
            }

            


            
        }
        return $user ?? false;
    }

}
