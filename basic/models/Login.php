<?php


namespace app\models;


use yii\base\Model;

class Login extends Model
{
    public $pass;
    public $email;
    public $text;

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