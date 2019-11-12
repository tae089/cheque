<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use kartik\daterange\DateRangePicker;
use app\models\Bank;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ChequeDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายการ Cheque';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cheque-detail-index">

    <p>
        <?= Html::a('เพิ่มรายการ Cheque', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
<<<<<<< HEAD
                'pager' => [
                    'firstPageLabel' => 'First',
                    'lastPageLabel' => 'Last',
                ],
                'options' => ['width' => '100%'],
                'responsive'=>true,
                'hover'=>true,
                'export' => [
                    'label' => 'Export',
                    'fontAwesome' => true,
                ],
                'exportConfig' => [
                    \kartik\grid\GridView::EXCEL => [
                        'fontAwesome' => true,
                        'label' => 'Export to Excel',
                        'icon' => 'file-excel-o',
                    ],
                ],
                'panel'=>['type'=>'primary', 'heading'=>'รายงานรวมทั้งหมด'],
=======
>>>>>>> master
                'columns' => [
                    ['class' => '\kartik\grid\SerialColumn'],

                    'cheque_id',
                    [
                        'attribute'=>'cheque_date',
<<<<<<< HEAD
                        'value'=> function($model){
                            if($model->cheque_date!=""){
                                $ndate = $model->cheque_date;
                                $ndate1 = explode("-",$ndate);
                                $ndate2 = $ndate1[0]+543;
                                return $ndate1[2]."-".$ndate1[1]."-".$ndate2;
                            }else{
                                return "";
                            }
                        },                
                        'filterType' => GridView::FILTER_DATE_RANGE,
                        'filterWidgetOptions' =>([
                                //'model'=>$model,
                            'attribute'=>'cheque_date',          
                            'convertFormat'=>true,  
                            'language' => 'th',     
                            'pluginOptions'=>[
                                'locale'=>[
                                    'format'=>'Y-m-d',
                                ],
                            ]
                        ])
=======
                        'filter' => DateRangePicker::widget([
                            'model' => $searchModel,
                            //'attribute' => 'dealerAvailableDate',
                            'convertFormat' => true,
                            'pluginOptions' => [
                                'locale' => [
                                    'format' => 'Y-m-d'
                                ],
                            ],
                        ]),
>>>>>>> master
                    ],
                    'cheque_buy_name:ntext',
                    [
                        'attribute' => 'bankname',
                        'filter' => ArrayHelper::map(Bank::find()->asArray()->all(), 'bank_name_th', 'bank_name_th'),
                    ],
                    'cheque_amont',
                    //'cheque_note:ntext',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
  <!-- /.box-body -->
  </div>

</div>
