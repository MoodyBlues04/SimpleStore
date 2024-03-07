<?php

namespace app\controllers;

use app\models\User;
use yii\web\Controller;

class ProfileController extends Controller
{
    public $layout = 'store';

    public function actionIndex(): \yii\web\Response|string
    {
        if (\Yii::$app->user->isGuest) {
            return $this->redirect('/auth/login');
        }
        /** @var User $user */
        $user = \Yii::$app->user->getIdentity();
        return $this->render('index', compact('user'));
    }
}