<?php


namespace app\models;


use yii\db\ActiveRecord;

class Regg extends ActiveRecord
{
//    public $first_name;
//    public $second_name;
//    public $address;
//    public $pass;
//    public $email;
    public static function tableName()
    {
        return 'public.users';
    }


    public function attributeLabels()
    {
        return [
            'pass' => 'Пароль',
            'firstname' => 'Имя',
            'secondname' => 'Фамилия',

        ];
    }

    public function rules()
    {
        return [
            [['pass', 'email', 'firstname', 'secondname', 'address'], 'required', 'message' => 'Поле обязательно к заполнению'],
            ['email', 'email', 'message' => 'Введите адрес электороной почты корректно '],
//            ['name', 'string', 'min' => 4],
//            ['name','string','max'=>12,'tooLong'=>'Сильно много букв!']
            ['name', 'string', 'length' => [4, 12], 'tooShort' => 'мало', 'tooLong' => 'много'],
            ['text', 'trim'],

        ];
    }


}