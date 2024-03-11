<?php

namespace app\controllers;

use app\models\User;
use app\modules\rbac\Roles;
use yii\web\Controller;

class ProfileController extends Controller
{
    public $layout = 'store';

    /**
     * Returns user's profile info.
     *
     * @return \yii\web\Response|string
     * @throws \Throwable
     */
    public function actionIndex(): \yii\web\Response|string
    {
        if (\Yii::$app->user->isGuest) {
            return $this->redirect('/auth/login');
        }

        /** @var User $user */
        $user = \Yii::$app->user->getIdentity();

        if (in_array(Roles::ADMIN_ROLE, $user->getRoleNames())) {
            return $this->redirect('/admin');
        }
        return $this->render('index', compact('user'));
    }
}