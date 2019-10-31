<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ChequeDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cheque-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cheque_id') ?>

    <?= $form->field($model, 'cheque_date') ?>

    <?= $form->field($model, 'cheque_buy_name') ?>

    <?= $form->field($model, 'bank_id') ?>

    <?= $form->field($model, 'cheque_amont') ?>

    <?php // echo $form->field($model, 'cheque_note') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
