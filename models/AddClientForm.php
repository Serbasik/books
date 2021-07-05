<?php


namespace app\models;

use yii\base\Model;
class AddClientForm extends Model
{
    public $fio;
    public $ser;
    public $num;

    public function rules()
    {
        return [
            [['fio','ser', 'num'], 'required', 'message' => 'Это поле обязательно для заполнения!'],

        ];
    }
}