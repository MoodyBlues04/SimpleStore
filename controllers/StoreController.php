<?php

namespace app\controllers;

use yii\web\Controller;

class StoreController extends Controller
{
    public $layout = 'store';

    public function actionIndex(): string
    {
        return $this->render('index');
    }
}