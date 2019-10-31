<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cheque_detail".
 *
 * @property integer $cheque_id
 * @property string $cheque_date
 * @property string $cheque_buy_name
 * @property integer $bank_id
 * @property double $cheque_amont
 * @property string $cheque_note
 */
class ChequeDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cheque_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bank_id', 'cheque_amont'], 'required'],
            [['cheque_id', 'bank_id'], 'integer'],
            [['cheque_date','bankName'], 'safe'],
            [['cheque_buy_name', 'cheque_note'], 'string'],
            [['cheque_amont'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */

    public function getBank()
    {
        return @$this->hasOne(Bank::className(), ['bank_id' => 'bank_id']);
    }

    public function getBankName()
    {
        return @$this->bank->bank_name_th;
    }

    public function attributeLabels()
    {
        return [
            'cheque_id' => 'เลขเช็ค',
            'cheque_date' => 'วันที่',
            'cheque_buy_name' => 'จ่าย',
            'bank_id' => 'ธนาคาร',
            'bankName' => Yii::t('app','ธนาคาร'),
            'cheque_amont' => 'จำนวน',
            'cheque_note' => 'หมายเหตุ',
        ];
    }
}
