<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use app\models\Bank;
use app\models\Contact;
/* @var $this yii\web\View */
/* @var $model app\models\ChequeDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cheque-detail-form">
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-money"></i> เพิ่มเช็ค</h3>
        </div>
        <div class="box-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'cheque_date')->widget(DatePicker::classname(), 
            [
                'removeButton' => false,
                'language' => 'th',
                'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true,
            ]
            ]); ?>

            <? //$form->field($model, 'cheque_buy_name')->textInput() ?>
        
           <?php 
           $listContact = ArrayHelper::map(Contact::find()->asArray()->all(), 'contact_id', 'contact_name');
           echo $form->field($model, 'cheque_buy_name')->widget(Select2::classname(), 
           [
               'data' => $listContact,
                'options' => ['placeholder' => 'กรุณาเลือก...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);?>
            <?php 

             $listData = ArrayHelper::map(Bank::find()->asArray()->all(), 'bank_id', 'bank_name_th');
             
             ?>
            <?= $form->field($model, 'bankname')->dropDownlist($listData,['prompt'=>'เลือกธนาคาร']) ?>

            <?= $form->field($model, 'cheque_amont')->textInput() ?>

            <?= $form->field($model, 'cheque_note')->textarea(['rows' => 6]) ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
            
        </div>
        <!-- /.box-body -->
    </div>
</div>
