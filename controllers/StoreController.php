<?php

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use app\models\Vendor;
use yii\db\ActiveQuery;
use yii\web\Controller;
use yii\web\Request;

class StoreController extends Controller
{
    public $layout = 'store';

    private Request $appRequest;

    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->appRequest = \Yii::$app->request;
    }

    public function actionIndex(): string
    {
//        TODO quering
        $productsQuery = Product::find();
        $productsQuery = $this->queryRequest($productsQuery);
        $products = $productsQuery->all();

        $categories = Category::find()->all();
        $vendors = Vendor::find()->all();
        return $this->render('index', compact('products', 'categories', 'vendors'));
    }

    public function actionShow()
    {

    }

    private function queryRequest(ActiveQuery $query): ActiveQuery
    {
        if ($search = $this->appRequest->get('search')) {
            $query->where(['like', 'name', "%{$search}%", false]);
        }
        if ($category = $this->appRequest->get('category')) {
            $query->where(['category_id' => $category]);
        }
//        TODO price
        return $query;
    }
}