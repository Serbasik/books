<?php


namespace app\models;

use yii\base\Model;

class AddBookForm extends Model
{
    public $title;
    public $art;
    public $date_in;
    public $avtor;

    public function rules()
    {
        return [
            [['title','date_in','avtor','art'], 'required', 'message' => 'Это поле обязательно для заполнения!'],

        ];
    }
}