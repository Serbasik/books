<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "conditions".
 *
 * @property int $id
 * @property string $condition
 */
class Conditions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'conditions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['condition'], 'required'],
            [['condition'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'condition' => 'Condition',
        ];
    }
}
