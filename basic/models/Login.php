<?php


namespace app\models;


use yii\base\Model;
use yii\db\ActiveRecord;

class Login extends ActiveRecord
{
    public static function tableName()
    {
        return 'public.users';
    }
    public function attributeLabels()
    {
        return [
            'pass' => 'Пароль',
            'text' => 'текст'
        ];
    }

    public function rules()
    {
        return [
            [['pass', 'email', 'text'], 'required', 'message' => 'Поле обязательно к заполнению'],
            ['email', 'email', 'message' => 'Введите адрес электороной почты корректно '],
//            ['name', 'string', 'min' => 4],
//            ['name','string','max'=>12,'tooLong'=>'Сильно много букв!']
            ['name', 'string', 'length' => [4, 12], 'tooShort' => 'мало', 'tooLong' => 'много'],
            ['text','trim'],
        ];
    }

}