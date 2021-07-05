<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employ".
 *
 * @property string $fio
 * @property string $post
 * @property int $id
 */
class Employ extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employ';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'post'], 'required'],
            [['fio'], 'string', 'max' => 150],
            [['post'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fio' => 'Fio',
            'post' => 'Post',
            'id' => 'ID',
        ];
    }
}
