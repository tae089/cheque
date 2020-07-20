<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cheque_detail".
 *
 * @property int $cheque_id
 * @property string $cheque_date วันที่
 * @property string $cheque_buy_name จ่ายให้
 * @property int $bank_id รหัสธนาคาร
 * @property double $cheque_amont จำนวนเงิน
 * @property string $cheque_note หมายเหตุ
 */
class ChequeDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
  
    public static function tableName()
    {
        return 'cheque_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cheque_date'], 'safe'],
            [['cheque_note'], 'string'],
            [['bank_id', 'cheque_amont'], 'required'],
            [['bank_id','cheque_buy_name'], 'integer'],
            [['cheque_amont'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cheque_id' => 'ลำดับ',
            'cheque_date' => 'วันที่ออก Cheque',
            'contactname' => Yii::t('app','จ่ายให้'),
            'bank_id' => 'ธนาคาร',
            'bankname' => Yii::t('app', 'ธนาคาร'),
            'cheque_amont' => 'จำนวนเงิน',
            'cheque_note' => 'หมายเหตุ'
        ];
    }

    public  function getBank()
    {
        return @$this->hasOne(Bank::className(), ['bank_id' => 'bank_id']);
    }

    public function getBankName()
    {
        return $this->bank->bank_name_th;
    }

    public function getContact()
    {
        return @$this->hasOne(Contact::className(), ['contact_id' => 'cheque_buy_name']);
    } 
    
    public function getContactName()
    {
        return $this->contact->contact_name;
    }

}
