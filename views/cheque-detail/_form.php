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

            <?php //$form->field($model, 'cheque_buy_name')->textInput() ?>
            <div class="rows">
                <div class="col-md-6">
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
                </div>
                <div class="col-md-6">
                    <?php 
                       $listContact = ArrayHelper::map(Contact::find()->asArray()->all(), 'contact_id', 'contact_name');
                       echo $form->field($model, 'cheque_buy_name')->widget(Select2::classname(), 
                       [
                           'data' => $listContact,
                            'options' => ['placeholder' => 'กรุณาเลือก...'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);
                    ?>
                </div>
            </div>
            <div class="rows">
                <div class="col-md-6">
                    <?php $listData = ArrayHelper::map(Bank::find()->asArray()->all(), 'bank_id', 'bank_name_th'); ?>
                    <?php 
                        
                        echo $form->field($model, 'bank_id')->dropDownlist($listData,['prompt'=>'เลือกธนาคาร']);
                    ?>
                </div>
                <div class="col-md-6">
                    <?php echo $form->field($model, 'cheque_amont')->textInput() ?>
                </div>
            </div>
            <div class="rows">
                <div class="col-md-12">
                    <?php echo $form->field($model, 'cheque_note')->textarea(['rows' => 6]) ?>
                </div>
            </div>
            <div class="rows">
                <div class="col-md-12">
                    <div class="form-group">
                        <?php echo Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                    </div>
                </div>
            </div>    

            <?php ActiveForm::end(); ?>
            
        </div>
        <!-- /.box-body -->
    </div>
</div>
