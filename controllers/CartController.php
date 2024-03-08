<?php

namespace app\controllers;

use yii\web\Controller;

class CartController extends Controller
{
    public $layout = 'store';

    public function add(): void
    {
        var_dump(\Yii::$app->request);
    }
}