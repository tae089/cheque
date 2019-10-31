<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ChequeDetail */

$this->title = $model->cheque_id;
$this->params['breadcrumbs'][] = ['label' => 'Cheque Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cheque-detail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->cheque_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->cheque_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cheque_id',
            'cheque_date',
            'cheque_buy_name:ntext',
            'bank_id',
            'cheque_amont',
            'cheque_note:ntext',
        ],
    ]) ?>

</div>
