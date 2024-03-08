<?php

namespace app\controllers;

use app\models\forms\admin\CreateVendorForm;
use app\models\forms\admin\EditRoleForm;
use app\models\forms\admin\EditUserForm;
use app\models\User;
use app\models\Vendor;
use yii\web\Controller;
use yii\web\Request;
use yii\web\Response;
use yii\web\Session;

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
    private Request $appRequest;
    private Session $session;

    /**
     * @throws \Throwable
     */
    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->admin = \Yii::$app->user->getIdentity();
        $this->appRequest = \Yii::$app->request;
        $this->session = \Yii::$app->getSession();
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
        if ($this->appRequest->isPost) {
            $form = new EditUserForm();
            if ($form->load($this->appRequest->post(), '') && $form->update()) {
                $this->session->setFlash('success', 'User updated');
            }
            return $this->redirect('/admin/user');
        }

        $userId = $this->appRequest->get('id');
        if (is_null($userId)) {
            $this->session->setFlash('error', 'Not specified user id');
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
        if ($this->appRequest->isPost) {
            $form = new EditRoleForm();
            if ($form->load($this->appRequest->post(), '') && $form->updateRole()) {
                $this->session->setFlash('success', 'Role updated');
            }
            return $this->redirect('/admin/role');
        }

        $roleName = $this->appRequest->get('role');
        if (is_null($roleName)) {
            $this->session->setFlash('error', 'Not specified role');
            return $this->redirect('/admin/role');
        }

        $role = \Yii::$app->authManager->getRole($roleName);
        $permissions = \Yii::$app->authManager->getPermissions();
        return $this->render('edit-role', compact('role', 'permissions'));
    }

    public function actionVendor(): string
    {
        $vendors = Vendor::find()->all();
        return $this->render('vendor', compact('vendors'));
    }

    public function actionCreateVendor(): string|Response
    {
        if ($this->appRequest->isPost) {
            $form = new CreateVendorForm();
            if ($form->load($this->appRequest->post(), '') && $form->create()) {
                $this->session->setFlash('success', 'Vendor created');
            }
            return $this->redirect('/admin/vendor');
        }
        return $this->render('create-vendor');
    }

    public function actionEditVendor(): string|Response
    {
        if ($this->appRequest->isPost) {
            $form = new CreateVendorForm();
            if ($form->load($this->appRequest->post(), '') && $form->update()) {
                $this->session->setFlash('success', 'Vendor updated');
            }
            return $this->redirect('/admin/vendor');
        }

        $vendorId = $this->appRequest->get('id');
        if (is_null($vendorId)) {
            $this->session->setFlash('error', 'Not specified vendor');
            return $this->redirect('/admin/vendor');
        }
        $vendor = Vendor::findOne($vendorId);

        return $this->render('edit-vendor', compact('vendor'));
    }

    public function actionDeleteVendor(): Response
    {
        $vendorId = $this->appRequest->get('id');
        if (is_null($vendorId)) {
            $this->session->setFlash('error', 'Not specified vendor');
            return $this->redirect('/admin/vendor');
        }
        $vendor = Vendor::findOne($vendorId);
        $vendor->delete();

        return $this->redirect('/admin/vendor');
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