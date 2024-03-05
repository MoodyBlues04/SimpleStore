<?php

namespace app\controllers;

use app\models\User;
use yii\web\Controller;

class TestController extends Controller
{
    public function actionIndex(): void
    {
        $user = new User();
        $user->username = "test";
        $user->email = "sokant2005@mail.ru";
        $user->setPassword("123456");
        $user->generateAuthKey();
        $user->generateEmailVerifyToken();
        $user->save();

        $user = User::findOne(1);

        var_dump(\Yii::$app->mailer->compose('@app/mail/email_confirm', compact('user'))
            ->setFrom(\Yii::$app->params['supportEmail'])
            ->setTo($user->email)
            ->setSubject('Email confirmation for ' . \Yii::$app->name)
            ->send());
        exit;
    }
}