<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use kartik\daterange\DateRangePicker;
use app\models\Bank;
use app\models\Contact;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ChequeDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายการเช็ค';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cheque-detail-index">

    <p>
        <?= Html::a('เพิ่มรายการ Cheque', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
             
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'pager' => [
                    'firstPageLabel' => 'First',
                    'lastPageLabel' => 'Last',
                ],
                'showOnEmpty'=>true,
                'panel'=>['type'=>'danger', 'heading'=> Html::encode($this->title)],
                'responsive'=>true,
                'hover'=>true,
                'pjax'=>true,
                // 'showPageSummary' => true,
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
                'columns' => [
                    ['class' => '\kartik\grid\SerialColumn'],

                    // ['attribute' => 'cheque_id',
                    // 'contentOptions' => ['style'=>'width: 40px;']    
                    // ],
                    [
                        'attribute'=>'cheque_date',
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
                    ],
                    [
                        'attribute' => 'contactname',
                        'filter' => ArrayHelper::map(Contact::find()->asArray()->all(), 'contact_name', 'contact_name'),
                        'filterType' => GridView::FILTER_SELECT2,
                        'filterWidgetOptions' => [
                            'options' => ['prompt' => ''],
                            'pluginOptions' => [
                                'allowClear' => true,
                                'width'=> 'auto'
                            ],
                        ],
                    ],
                    [
                        'attribute' => 'bankname',
                        'options' => ['width' => '200px'],
                        'filter' => ArrayHelper::map(Bank::find()->asArray()->all(), 'bank_name_th', 'bank_name_th'),
                    ],
                    [
                        'attribute'=>'cheque_amont',
                        'options' => ['width' => '130px'],
                        'value'=> function($model){
                            return number_format($model->cheque_amont);
                        }
                    ],
                    //'cheque_note:ntext',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
</div>
