<?php

namespace frontend\controllers;

use common\models\Car;
use common\models\Rent;
use frontend\models\RentFrom;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CarController implements the CRUD actions for Car model.
 */
class CarController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Car models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Car::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Car model.
     * @param string $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = Car::findOne($id);
        $model1 = new RentFrom();
        if (!$model) {
            throw new NotFoundHttpException("Car does not exist");
        }
        if($model1->load(\Yii::$app->request->post())){
            $result=$model1->saveData($id);
            if($result==1){
                \Yii::$app->session->setFlash('success', 'successful renting');
            }
            else{
                \Yii::$app->session->setFlash('error', 'The Car is Unavailable');
            }
            return $this->refresh();
        }

        return $this->render('view', [
            'model1' => $model1,
            'model' => $model,
        ]);
    }

    public function actionRent($id)
    {
//        $model1 = new Rent();
//        $model1->user_id=\Yii::$app->user->id;
//        $model1->car_id=$id;
//        $model1->name=$model1->user->username;
//        $model1->email=$model1->user->email;
//        $model1->order_at=time();
//        $model1->from_date=$this->from_date;
//        $model1->to_date=$this->to_date;
//        $model1->save();

        $model1 = new Rent();

        if ($this->request->isPost) {
            if ($model1->load($this->request->post()) && $model1->save()) {
                return $this->redirect(['view', 'id' => $model1->id]);
            }
        } else {
            $model1->loadDefaultValues();
        }

        return $this->render('rent', [
            'model1' => $model1,
        ]);
    }

    /**
     * Creates a new Car model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Car();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Car model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Car model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Car model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return Car the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Car::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
