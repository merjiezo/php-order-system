<?php

namespace app\controllers;

use Yii;
use app\models\Ordertables;
use app\models\OrdertablesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrdertablesController implements the CRUD actions for Ordertables model.
 */
class OrdertablesController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Ordertables models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrdertablesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ordertables model.
     * @param string $order_id
     * @param string $item_id
     * @return mixed
     */
    public function actionView($order_id, $item_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($order_id, $item_id),
        ]);
    }

    /**
     * Creates a new Ordertables model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ordertables();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'order_id' => $model->order_id, 'item_id' => $model->item_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Ordertables model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $order_id
     * @param string $item_id
     * @return mixed
     */
    public function actionUpdate($order_id, $item_id)
    {
        $model = $this->findModel($order_id, $item_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'order_id' => $model->order_id, 'item_id' => $model->item_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Ordertables model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $order_id
     * @param string $item_id
     * @return mixed
     */
    public function actionDelete($order_id, $item_id)
    {
        $this->findModel($order_id, $item_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Ordertables model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $order_id
     * @param string $item_id
     * @return Ordertables the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($order_id, $item_id)
    {
        if (($model = Ordertables::findOne(['order_id' => $order_id, 'item_id' => $item_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
