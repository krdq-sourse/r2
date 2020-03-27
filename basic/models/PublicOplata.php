<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "public.oplata".
 *
 * @property string|null $email
 * @property string|null $category
 * @property float|null $sum
 * @property string|null $time
 */
class PublicOplata extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */

    public static function tableName()
    {
        return 'public.oplata';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'category'], 'string'],
            [['sum'], 'number'],
            [['time'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'email' => 'Email',
            'category' => 'Category',
            'sum' => 'Sum',
            'time' => 'Time',
        ];
    }
    public static function primaryKey()
    {
        return ['email'];
    }
}
