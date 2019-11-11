<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bank".
 *
 * @property int $bank_id
 * @property string $bank_name_th
 * @property string $bank_name_en
 */
class Bank extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bank';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bank_name_en'], 'required'],
            [['bank_name_th', 'bank_name_en'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'bank_id' => 'Bank ID',
            'bank_name_th' => 'Bank Name Th',
            'bank_name_en' => 'Bank Name En',
        ];
    }
}
