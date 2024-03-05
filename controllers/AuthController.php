<?php

namespace app\controllers;

use app\models\forms\EmailConfirm;
use app\models\forms\LoginForm;
use app\models\forms\SignupForm;
use yii\base\Exception;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use Yii;

class AuthController extends Controller
{
    public $layout = 'store';

    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionLogin(): \yii\web\Response|string
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout(): \yii\web\Response
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * @throws Exception
     */
    public function actionSignup(): \yii\web\Response|string
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->getSession()->setFlash('success', 'Подтвердите ваш электронный адрес.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionEmailConfirm($token): \yii\web\Response
    {
        $model = new EmailConfirm($token);

        if ($model->verifyEmail()) {
            Yii::$app->getSession()->setFlash('success', 'Success.');
        } else {
            Yii::$app->getSession()->setFlash('error', 'Email verify failed.');
        }

        return $this->goHome();
    }
}