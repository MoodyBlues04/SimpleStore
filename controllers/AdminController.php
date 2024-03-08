<?php

namespace app\controllers;

use app\models\forms\admin\EditUserForm;
use app\models\User;
use yii\web\Controller;
use yii\web\Response;

class AdminController extends Controller
{
//    TODO 1) permissions for each action
//    TODO 2) products index with pagination and filters
//    TODO 3) shopping cart
//    TODO 4) profile finish & small todos
//    TODO 5) describe all

    /*
    users edit only roles
    Products list & add
    permissions just list & add
    vendors: list & add
    categories: list & add
     */

    public $layout = 'admin_dashboard';

    private User $admin;

    /**
     * @throws \Throwable
     */
    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->admin = \Yii::$app->user->getIdentity();
    }

    public function actionIndex(): string
    {
        return $this->render('index', ['admin' => $this->admin]);
    }

    public function actionUser(): string
    {
        $users = User::find()->where(['<>', 'id', $this->admin->id])->all();
        return $this->render('user', [
            'admin' => $this->admin,
            'users' => $users,
        ]);
    }

    public function actionEditUser(): string|Response
    {
        if (\Yii::$app->request->isPost) {
            $form = new EditUserForm();
            if ($form->load(\Yii::$app->request->post(), '') && $form->update()) {
                \Yii::$app->getSession()->setFlash('success', 'User updated');
            }
            return $this->redirect('/admin/user');
        }

        $userId = \Yii::$app->request->get('id');
        if (is_null($userId)) {
            \Yii::$app->getSession()->setFlash('error', 'Not specified user id');
            return $this->redirect('/admin/user');
        }

        $user = User::findOne($userId);
        $roles = \Yii::$app->authManager->getRoles();
        return $this->render('edit-user', [
            'admin' => $this->admin,
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    public function actionPermission(): string
    {
        return $this->render('user');
    }

    public function actionVendor(): string
    {
        return $this->render('user');
    }

    public function actionCategory(): string
    {
        return $this->render('user');
    }

    public function actionProduct(): string
    {
        return $this->render('user');
    }
}