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
        return $this->render('user', compact('users'));
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
        return $this->render('edit-user', compact('user', 'roles'));
    }

    public function actionRole(): string
    {
        $roles = \Yii::$app->authManager->getRoles();

        return $this->render('roles', compact('roles'));
    }

    public function actionEditRole(): string|Response
    {
        if (\Yii::$app->request->isPost) {
//            $form = new EditUserForm();
//            if ($form->load(\Yii::$app->request->post(), '') && $form->update()) {
//                \Yii::$app->getSession()->setFlash('success', 'User updated');
//            }
            return $this->redirect('/admin/role');
        }

        $roleName = \Yii::$app->request->get('role');
        if (is_null($roleName)) {
            \Yii::$app->getSession()->setFlash('error', 'Not specified role');
            return $this->redirect('/admin/role');
        }

        $role = \Yii::$app->authManager->getRole($roleName);
        $permissions = \Yii::$app->authManager->getPermissions();
        return $this->render('edit-role', compact('role', 'permissions'));
    }

    public function actionVendor(): string
    {
        return $this->render('vendor');
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