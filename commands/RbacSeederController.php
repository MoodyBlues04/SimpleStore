<?php

namespace app\commands;

use app\database\seeders\RbacSeeder;
use yii\base\Exception;
use yii\console\Controller;

class RbacSeederController extends Controller
{
    private RbacSeeder $seeder;

    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->seeder = new RbacSeeder();
    }

    /**
     * @throws Exception
     */
    public function actionSeed(): void
    {
        $this->seeder->seed();
    }
}