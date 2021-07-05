<?php


namespace app\models;

use yii\base\Model;
class GiveOutForm extends Model
{
    public $date_out;
    public $book_id;
    public $employ_id;
    public $date_back;

    public function rules()
    {
        return [
            [['date_out','book_id', 'employ_id', 'date_back'], 'required', 'message' => 'Это поле обязательно для заполнения!'],

        ];
    }

}