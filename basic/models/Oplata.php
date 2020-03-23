<?php


namespace app\models;


use yii\db\ActiveRecord;

class Oplata extends ActiveRecord
{
    public static function tableName()
    {
        return 'public.oplata';
    }
    public function rules()
    {
        return [
            [['email'], 'required', 'message' => 'Поле обязательно к заполнению'],
            ['email', 'email', 'message' => 'Введите адрес электороной почты корректно '],
//            ['name', 'string', 'min' => 4],
//            ['name','string','max'=>12,'tooLong'=>'Сильно много букв!']


        ];
    }

}