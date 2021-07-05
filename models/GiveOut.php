<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "give_out".
 *
 * @property int $id
 * @property int $date_out
 * @property int $book_id
 * @property int $employ_id
 * @property int $date_back
 */
class GiveOut extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'give_out';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_out', 'book_id', 'employ_id', 'date_back'], 'required'],
            [['date_out', 'book_id', 'employ_id', 'date_back'], 'default', 'value' => null],
            [['date_out', 'book_id', 'employ_id', 'date_back'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_out' => 'Date Out',
            'book_id' => 'Book ID',
            'employ_id' => 'Employ ID',
            'date_back' => 'Date Back',
        ];
    }
}
