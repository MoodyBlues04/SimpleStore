<?php

namespace app\controllers;

use app\models\Product;
use yii\web\Controller;
use yii\web\Request;
use yii\web\Response;
use yii\web\Session;

class CartController extends Controller
{
    public $layout = 'store';

    private Request $appRequest;
    private Session $session;

    /**
     * @throws \Throwable
     */
    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->appRequest = \Yii::$app->request;
        $this->session = \Yii::$app->getSession();
    }

    public function actionIndex(): string
    {
        $productsIds = $this->session->get('products', []);
        $products = Product::find()->where(['in', 'id', $productsIds])->all();
        return $this->render('index', compact('products'));
    }

    public function actionAdd(): Response
    {
        if ($productId = $this->appRequest->get('product')) {
            $products = $this->session->get('products', []);
            $products[] = $productId;
            $this->session->set('products', $products);
        }

//        return $this->asJson(['success' => true]);
        return $this->goBack();
    }

    public function actionRemove(): Response
    {
        if ($productId = $this->appRequest->get('product')) {
            $products = $this->session->get('products', []);
            if (($key = array_search($productId, $products)) !== false) {
                unset($products[$key]);
            }
        }

//        return $this->asJson(['success' => true]);
        return $this->goBack();
    }

    public function actionRemoveAll(): Response
    {
        $this->session->set('products', []);
        return $this->redirect('/cart');
    }

    public function actionCheckout()
    {
        echo '<pre>';
        var_dump(\Yii::$app->request->get());
    }
}