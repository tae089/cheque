<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ChequeDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cheque Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cheque-detail-index">

    <h1><?php echo Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('เพิ่มเช็ค Cheque', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            'cheque_id',
            'cheque_date',
            'cheque_buy_name:ntext',
            'bankName',
            'cheque_amont',
            // 'cheque_note:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{pdf} {update} {delete}',
                'contentOptions'=>[
                  'noWrap' => true
                ],
                'buttons'=>[
                  'pdf' => function($url,$model,$key){
                      return Html::a('<i class="glyphicon glyphicon-print"></i>',$url);
                    }
                  ]
              ],
        ],
    ]); ?>
</div>
