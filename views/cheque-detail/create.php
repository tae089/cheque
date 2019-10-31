<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ChequeDetail */

$this->title = 'เพิ่มเช็ค Cheque';
$this->params['breadcrumbs'][] = ['label' => 'Cheque Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cheque-detail-create">

    <h1><? //Html::encode($this->title) ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
