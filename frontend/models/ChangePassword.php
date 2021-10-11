<?php

namespace frontend\models;

use common\models\User;
use Yii;
use yii\base\Model;
use yii\web\BadRequestHttpException;

class ChangePassword extends Model
{
    public $currentPassword;
    public $newPassword;
    public $repeatPassword;

    public function rules()
    {
        return [
//            ['currentPassword', 'compareCurrentPassword'],
            [['currentPassword', 'newPassword', 'repeatPassword'], 'required'],
            [['currentPassword', 'newPassword', 'repeatPassword'], 'string', 'min' => 8],
            ['repeatPassword', 'compare', 'compareAttribute' => 'newPassword'],
        ];
    }

    public function changePassword() {
        $userId = \Yii::$app->user->id;
        $model = User::findOne($userId);
        $passwordHash = $model->password_hash;

        if (Yii::$app->security->validatePassword($this->currentPassword, $passwordHash)) {
            $model->setPassword($this->newPassword);
            if ($model->save()) {
                return true;
            } else {
                return BadRequestHttpException::class;
            }
        } else {
            \Yii::$app->session->setFlash('error', 'Current password is incorrect');
        }
    }
}