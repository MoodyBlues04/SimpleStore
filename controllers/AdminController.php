<?php

namespace app\controllers;

use app\models\Category;
use app\models\forms\admin\CreateCategoryForm;
use app\models\forms\admin\CreateProductForm;
use app\models\forms\admin\CreateVendorForm;
use app\models\forms\admin\EditRoleForm;
use app\models\forms\admin\EditUserForm;
use app\models\Product;
use app\models\User;
use app\models\Vendor;
use yii\web\Controller;
use yii\web\Request;
use yii\web\Response;
use yii\web\Session;

class AdminController extends Controller
{
//    TODO 1) permissions for each action
//    TODO 7) icons in show
//    TODO 3) shopping cart
//    TODO 4) profile finish & small todos
//    TODO 5) describe all
//    TODO 6) refactor (remove copy paste cruds e t c)

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
        $categories = Category::find()->all();
        return $this->render('category', compact('categories'));
    }

    public function actionCreateCategory(): string|Response
    {
        if ($this->appRequest->isPost) {
            $form = new CreateCategoryForm();
            if ($form->load($this->appRequest->post(), '') && $form->create()) {
                $this->session->setFlash('success', 'Category created');
            }
            return $this->redirect('/admin/category');
        }
        return $this->render('create-category');
    }

    public function actionEditCategory(): string|Response
    {
        if ($this->appRequest->isPost) {
            $form = new CreateCategoryForm();
            if ($form->load($this->appRequest->post(), '') && $form->update()) {
                $this->session->setFlash('success', 'Category updated');
            }
            return $this->redirect('/admin/category');
        }

        $categoryId = $this->appRequest->get('id');
        if (is_null($categoryId)) {
            $this->session->setFlash('error', 'Not specified category');
            return $this->redirect('/admin/category');
        }
        $category = Category::findOne($categoryId);

        return $this->render('edit-category', compact('category'));
    }

    public function actionDeleteCategory(): Response
    {
        $categoryId = $this->appRequest->get('id');
        if (is_null($categoryId)) {
            $this->session->setFlash('error', 'Not specified category');
            return $this->redirect('/admin/category');
        }
        $category = Category::findOne($categoryId);
        $category->delete();

        return $this->redirect('/admin/category');
    }

    public function actionProduct(): string
    {
        $products = Product::find()->all();
        return $this->render('product', compact('products'));
    }


    public function actionCreateProduct(): string|Response
    {
        if ($this->appRequest->isPost) {
            $form = new CreateProductForm();
            if ($form->load($this->appRequest->post(), '') && $form->create()) {
                $this->session->setFlash('success', 'Product created');
            }
            return $this->redirect('/admin/product');
        }

        $vendors = Vendor::find()->all();
        $categories = Category::find()->all();
        return $this->render('create-product', compact('vendors', 'categories'));
    }

    public function actionEditProduct(): string|Response
    {
        if ($this->appRequest->isPost) {
            $form = new CreateProductForm();
            if ($form->load($this->appRequest->post(), '') && $form->update()) {
                $this->session->setFlash('success', 'Product updated');
            }
            return $this->redirect('/admin/product');
        }

        $productId = $this->appRequest->get('id');
        if (is_null($productId)) {
            $this->session->setFlash('error', 'Not specified product');
            return $this->redirect('/admin/product');
        }

        $product = Product::findOne($productId);
        $vendors = Vendor::find()->all();
        $categories = Category::find()->all();
        return $this->render('edit-product', compact('product', 'vendors', 'categories'));
    }

    public function actionDeleteProduct(): Response
    {
        $productId = $this->appRequest->get('id');
        if (is_null($productId)) {
            $this->session->setFlash('error', 'Not specified product');
            return $this->redirect('/admin/product');
        }
        $product = Product::findOne($productId);
        $product->delete();

        return $this->redirect('/admin/product');
    }
}