<?php

namespace app\commands;

use app\database\seeders\RbacSeeder as Seeder;
use yii\base\Exception;
use yii\console\Controller;

class RbacSeederController extends Controller
{
    private Seeder $seeder;

    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->seeder = new Seeder();
    }

    /**
     * @throws Exception
     */
    public function actionSeed(): void
    {
        $this->seeder->seed();
    }
}