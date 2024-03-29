<?php

namespace app\controllers;

use app\models\forms\auth\EmailConfirm;
use app\models\forms\auth\LoginForm;
use app\models\forms\auth\SignupForm;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

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

    /**
     * Logges in user, validates his input.
     * @return \yii\web\Response|string
     */
    public function actionLogin(): \yii\web\Response|string
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        try {
            $model = new LoginForm();
            if ($model->load(Yii::$app->request->post(), '') && $model->login()) {
                \Yii::$app->getSession()->setFlash('success', 'You\'ve successfully logged in');
                return $this->goBack();
            }
        } catch (\Exception $e) {
            \Yii::$app->getSession()->setFlash('error', $e->getMessage());
        }
        return $this->render('login');
    }

    /**
     * Log out.
     * @return \yii\web\Response
     */
    public function actionLogout(): \yii\web\Response
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Validates users input, sends to him mail for email verification and signes in.
     * @return \yii\web\Response|string
     */
    public function actionSignup(): \yii\web\Response|string
    {
        try {
            $model = new SignupForm();
            if ($model->load(Yii::$app->request->post(), '') && $model->signUp()) {
                Yii::$app->getSession()->setFlash('success', 'Подтвердите ваш электронный адрес.');
                return $this->render('signup');
            }
        } catch (\Exception $e) {
            Yii::$app->getSession()->setFlash('error', $e->getMessage());
        }
        return $this->render('signup');
    }

    /**
     * Verifies users email confirmation.
     * @param $token
     * @return \yii\web\Response
     */
    public function actionEmailConfirm($token): \yii\web\Response
    {
        $model = new EmailConfirm($token);

        if ($model->verifyEmail()) {
            Yii::$app->getSession()->setFlash('success', 'Success.');
        } else {
            Yii::$app->getSession()->setFlash('error', 'Email verify failed.');
        }

        return $this->redirect('/auth/login');
    }
}