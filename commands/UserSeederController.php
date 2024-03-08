<?php

namespace app\commands;

use app\database\seeders\UserSeeder;
use yii\console\Controller;

class UserSeederController extends Controller
{
    private UserSeeder $seeder;

    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->seeder = new UserSeeder();
    }

    /**
     * @throws \Exception
     */
    public function actionSeed(): void
    {
        $this->seeder->seed();
    }
}