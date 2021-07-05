<?php


namespace app\models;

use yii\base\Model;
class ReturnsBookForm extends Model
{
    public $date_back;
    public $book_id;
    public $condition;
    public $employ_id;

    public function rules()
    {
        return [
            [['date_back','book_id', 'employ_id', 'condition'], 'required', 'message' => 'Это поле обязательно для заполнения!'],

        ];
    }
}