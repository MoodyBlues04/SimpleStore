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
    public const SORT_NEWEST = 'newest';
    public const SORT_LATEST = 'latest';
    public const SORT_PRICE = 'price';

    public $layout = 'store';

    private Request $appRequest;

    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->appRequest = \Yii::$app->request;
    }

    public function actionIndex(): string
    {
        $productsQuery = Product::find();
        $productsQuery = $this->queryFilters($productsQuery);
        $productsQuery = $this->querySort($productsQuery);
        $products = $productsQuery->all();

        $page = $this->appRequest->get('page', 1);
        $perPage = 10;

        $categories = Category::find()->all();
        $vendors = Vendor::find()->all();
        return $this->render('index', compact(
            'products',
            'categories',
            'vendors',
            'page',
            'perPage'
        ));
    }

    public function actionShow()
    {

    }

    private function queryFilters(ActiveQuery $query): ActiveQuery
    {
        if ($search = $this->appRequest->get('search')) {
            $query->where(['like', 'name', "%{$search}%", false]);
        }
        if ($category = $this->appRequest->get('category')) {
            $query->where(['category_id' => $category]);
        }
        if ($minPrice = $this->appRequest->get('min_price')) {
            $query->where(['>=', 'price', $minPrice]);
        }
        if ($maxPrice = $this->appRequest->get('max_price')) {
            $query->where(['<=', 'price', $maxPrice]);
        }
        return $query;
    }

    private function querySort(ActiveQuery $query): ActiveQuery
    {
        if ($sort = $this->appRequest->get('sort_by')) {
            if (self::SORT_PRICE === $sort) {
                $query->orderBy(['price' => 'asc']);
            } elseif (self::SORT_NEWEST === $sort) {
                $query->orderBy(['created_at' => 'desc']);
            } elseif (self::SORT_LATEST === $sort) {
                $query->orderBy(['created_at' => 'asc']);
            }
        }
        return $query;
    }
}