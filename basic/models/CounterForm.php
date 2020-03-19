<?php


namespace app\models;


use yii\base\Model;

class CounterForm extends Model
{
     public $num;
     public $category;
    public function attributeLabels()
    {
        return [
            'category'=>'Выберите категорию',
           'num' => 'Напишите сюда показатели счетчика ',
        ];
    }
    public function rules()
    {
        return [
            [['num'], 'required', 'message' => 'Поле обязательно к заполнению'],
            ['email', 'email', 'message' => 'Введите адрес электороной почты корректно '],
//            ['name', 'string', 'min' => 4],
//            ['name','string','max'=>12,'tooLong'=>'Сильно много букв!']
            ['num', 'string', 'length' => [8,8], 'tooShort' => 'мало', 'tooLong' => 'много'],
            ['num','trim'],

        ];
    }
}