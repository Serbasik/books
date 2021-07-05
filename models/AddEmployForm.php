<?php


namespace app\models;
use yii\base\Model;

class AddEmployForm extends Model
{
    public $fio;
    public $post;

    public function rules()
    {
        return [
            [['fio','post'], 'required', 'message' => 'Это поле обязательно для заполнения!'],

        ];
    }

}