<?php

namespace frontend\models;

use common\models\Car;
use Yii;
use yii\base\Model;
use common\models\Rent;
use yii\web\BadRequestHttpException;

class RentFrom extends Model
{
    public $name;
    public $email;
    public $from_date;
    public $to_date;

    public function rules()
    {
        return [
            [['name', 'email', 'from_date', 'to_date',], 'required'],
            ['email', 'email']
        ];
    }


    public function saveData($id) {
        $car = Car::findOne($id);

        $carStatus=$car->car_status;

        $fromDate=$car->from_date;

        $toDate=$car->to_date;

        if($carStatus == "AVAILABLE"){
            if (Yii::$app->user->isGuest) {

                $model= new Rent();

                $model->car_id=$id;
                $model->name=$this->name;
                $model->email=$this->email;
                $model->order_at=time();
                $model->from_date=$this->from_date;
                $model->to_date=$this->to_date;

                if ($model->save()) {
                    return true;
                } else {
                    return BadRequestHttpException::class;
                }

            } else {
                $model= new Rent();

                $model->user_id=\Yii::$app->user->id;
                $model->car_id=$id;
                $model->name=$model->user->username;
                $model->email=$model->user->email;
                $model->order_at=time();
                $model->from_date=$this->from_date;
                $model->to_date=$this->to_date;

                if ($model->save()) {
                    return true;
                } else {
                    return BadRequestHttpException::class;
                }
            }
        }

        else {
            $carRent = Rent::find()->where(['car_id' => $id])->all();

            foreach ($carRent as $carRentCheck) {

                if (strtotime($this->to_date) < $carRentCheck->from_date){
                    if (Yii::$app->user->isGuest) {
                        $model= new Rent();

                        $model->car_id=$id;
                        $model->name=$this->name;
                        $model->email=$this->email;
                        $model->order_at=time();
                        $model->from_date=$this->from_date;
                        $model->to_date=$this->to_date;

                        if ($model->save()) {
                            return true;
                        } else {
                            return BadRequestHttpException::class;
                        }

                    } else {
                        $model= new Rent();

                        $model->user_id=\Yii::$app->user->id;
                        $model->car_id=$id;
                        $model->name=$model->user->username;
                        $model->email=$model->user->email;
                        $model->order_at=time();
                        $model->from_date=$this->from_date;
                        $model->to_date=$this->to_date;

                        if ($model->save()) {
                            return true;
                        } else {
                            return BadRequestHttpException::class;
                        }
                    }
                }

                elseif (strtotime($this->from_date) > $carRentCheck->to_date){
                    if (Yii::$app->user->isGuest) {
                        $model= new Rent();

                        $model->car_id=$id;
                        $model->name=$this->name;
                        $model->email=$this->email;
                        $model->order_at=time();
                        $model->from_date=$this->from_date;
                        $model->to_date=$this->to_date;

                        if ($model->save()) {
                            return true;
                        } else {
                            return BadRequestHttpException::class;
                        }

                    } else {
                        $model= new Rent();

                        $model->user_id=\Yii::$app->user->id;
                        $model->car_id=$id;
                        $model->name=$model->user->username;
                        $model->email=$model->user->email;
                        $model->order_at=time();
                        $model->from_date=$this->from_date;
                        $model->to_date=$this->to_date;

                        if ($model->save()) {
                            return true;
                        } else {
                            return BadRequestHttpException::class;
                        }
                    }
                }
            }
        }
    }
}