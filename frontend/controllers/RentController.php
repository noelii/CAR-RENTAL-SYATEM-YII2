<?php

namespace frontend\controllers;

use common\models\Car;
use common\models\Rent;
use frontend\models\RentFrom;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * RentController implements the CRUD actions for Rent model.
 */
class RentController extends Controller
{
    public $from_date;
    public $to_date;
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'rules' => [
//                    [
//                        'allow' => true,
//                        'roles' => ['?'],
//                    ],
//                ],
//            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Rent models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Rent::find(),
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
     * Displays a single Rent model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionHistory($user_id)
    {
        $model = Rent::find()->where(['user_id' => \Yii::$app->user->id])->all();
        return $this->render('history', [
            'model' => $model,
        ]);
    }

    public function actionUploadSlip($user_id)
    {
        $model = Rent::find()->andwhere(['user_id' => \Yii::$app->user->id])->andWhere(['approve_order' => null])->all();
        return $this->render('upload-slip', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Rent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model1 = new RentFrom();

        $model2 = Rent::find()->andWhere(['!=', 'approve_order', 'Cancelled'])->orWhere(['approve_order' => null])->andWhere(['>', 'to_date', time()])->andWhere(['car_id'=>$id])->all();

        $model = Car::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException("Car does not exist");
        }

        if($model1->load(yii::$app->request->post()))
        {
            $result = $model1->saveData($id);

            if($result==true)
            {
                \Yii::$app->session->setFlash('success', 'Successful Renting You Have Only 1 Hour To Pay Before Your Order Is Canceled!');
                return $this->redirect(['create', 'id' => $model->id]);
            }
            else
            {
                \Yii::$app->session->setFlash('error', 'The Car Has Been Rented You Can Change Renting Dates Or Rent Another Car');
            }

        }

        return $this->render('create', [
            'model' => $model,
            'model1' => $model1,
            'model2' => $model2,
        ]);
    }

    /**
     * Updates an existing Rent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model->payslip =UploadedFile::getInstanceByName('payslip');

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            \Yii::$app->session->setFlash('success', 'Payslip Uploaded Successfully');
            return $this->redirect(['update', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Rent model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Rent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Rent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Rent::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
