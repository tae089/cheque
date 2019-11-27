<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ChequeDetail */

$this->title = 'เพิ่มเช็ค';
$this->params['breadcrumbs'][] = ['label' => 'Cheque Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cheque-detail-create">

    <!-- <h3><?// Html::encode($this->title) ?></h3> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
