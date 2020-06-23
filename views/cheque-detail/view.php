<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ChequeDetail */

$this->title = $model->cheque_id;
$this->params['breadcrumbs'][] = ['label' => 'Cheque Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cheque-detail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->cheque_id], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->cheque_id], [
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
            'contactname:ntext',
            'bankname',
            'cheque_amont',
            'cheque_note:ntext',
        ],
    ]) ?>

</div>
