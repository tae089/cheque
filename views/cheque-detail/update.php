<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ChequeDetail */

$this->title = 'Update Cheque Detail: ' . $model->cheque_id;
$this->params['breadcrumbs'][] = ['label' => 'Cheque Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cheque_id, 'url' => ['view', 'id' => $model->cheque_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cheque-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
