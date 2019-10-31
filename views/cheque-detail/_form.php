<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
use app\models\Bank;

/* @var $this yii\web\View */
/* @var $model app\models\ChequeDetail */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="cheque-detail-form">

<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo $this->title; ?></h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
        <div class="box-body">
      <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
            <?php
            $bank = Bank::find()->all();
             $listData=ArrayHelper::map($bank,'bank_id','bank_name_th');
            echo $form->field($model, 'bank_id')->dropDownList($listData, ['prompt'=>'เลือก...']) ?>
           
           <?= $form->field($model, 'cheque_date')->widget(
            DatePicker::className(), [
            'model' => $model,
            'attribute' => 'cheque_date',
            'template' => '{addon}{input}',
            'language' => 'th',
            'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
            ]
            ]); ?>

            
            <?php echo $form->field($model, 'cheque_buy_name')->textInput() ?>

            <?php echo $form->field($model, 'cheque_amont')->textInput() ?>
            
            
            <?php echo  $form->field($model, 'cheque_note')->textarea(['rows' => 6]) ?>
           
            <div class="form-group">
                <?php echo Html::submitButton($model->isNewRecord ? 'บันทึก' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
        
            <?php ActiveForm::end(); ?>
        </div>
        <!-- /.box-body -->
   
    </div>
</div>

<!-- <div class="cheque-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cheque_id')->textInput() ?>

    <?= $form->field($model, 'cheque_date')->textInput() ?>

    <?= $form->field($model, 'cheque_buy_name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'bank_id')->textInput() ?>

    <?= $form->field($model, 'cheque_amont')->textInput() ?>

    <?= $form->field($model, 'cheque_note')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div> -->
