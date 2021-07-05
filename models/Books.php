<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property string $title
 * @property string $art
 * @property int $date_in
 * @property string $avtor
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'art', 'date_in', 'avtor'], 'required'],
            [['date_in'], 'default', 'value' => null],
            [['date_in'], 'integer'],
            [['title', 'avtor'], 'string', 'max' => 100],
            [['art'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'art' => 'Art',
            'date_in' => 'Date In',
            'avtor' => 'Avtor',
        ];
    }
}
