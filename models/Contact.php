<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $contact_id
 * @property string $contact_name
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //[['contact_id'], 'required'],
            [['contact_id'], 'integer'],
            [['contact_name'], 'string', 'max' => 200],
            [['contact_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'contact_id' => 'รหัสผู้ติดต่อ',
            'contact_name' => 'รายชื่อผู้ติดต่อ',
        ];
    }
}
