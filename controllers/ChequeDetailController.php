<?php

namespace app\controllers;

use Yii;
use app\models\ChequeDetail;
use app\models\ChequeDetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;

/**
 * ChequeDetailController implements the CRUD actions for ChequeDetail model.
 */
class ChequeDetailController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ChequeDetail models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['/user/security/login']);
        }

        $searchModel = new ChequeDetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ChequeDetail model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['/user/security/login']);
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ChequeDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $searchModel = new ChequeDetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new ChequeDetail();
        //$data = Yii::$app->request->post();
        //print_r($data['ChequeDetail']['cheque_date']);
        
        if ($model->load(Yii::$app->request->post())) {
            $data = Yii::$app->request->post();
            
            $model->cheque_date = $data['ChequeDetail']['cheque_date'];
            $model->cheque_buy_name = $data['ChequeDetail']['cheque_buy_name'];
            $model->bank_id = $data['ChequeDetail']['bank_id'];
            $model->cheque_amont = $data['ChequeDetail']['cheque_amont'];
            $model->cheque_note = $data['ChequeDetail']['cheque_note'];
            $model->save();

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ChequeDetail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        //var_dump($model);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cheque_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ChequeDetail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ChequeDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ChequeDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ChequeDetail::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionPrint($id, $bank_id)
    {
        
        $model = ChequeDetail::findOne($id);
        if ($model->bank_id==1) {
            $this->renderPartial('print_ktb_bank', ['data' => $model]);
         } else if ($model->bank_id==8) {
            $this->renderPartial('print_baac_bank', ['data' => $model]);
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
