<?php

namespace app\database\seeders;

use app\models\User;
use app\modules\rbac\Roles;
use yii\base\Exception;
use yii\rbac\ManagerInterface;

class UserSeeder
{
    private const DEFAULT_PASSWORD = '123456';

    private ManagerInterface $auth;

    public function __construct()
    {
        $this->auth = \Yii::$app->authManager;
    }

    /**
     * @throws \Exception
     */
    public function seed()
    {
        $testUser = $this->createUser('test', 'test@test.com');
        $admin = $this->createUser('admin', 'admin@admin.com');

        $this->auth->assign($this->auth->getRole(Roles::ADMIN_ROLE), $admin->id);
    }

    /**
     * @throws Exception
     */
    private function createUser(
        string $name,
        string $email,
        string $password = self::DEFAULT_PASSWORD,
        bool $authorized = true
    ): ?User {
        $user = new User();
        $user->username = $name;
        $user->email = $email;
        $user->setPassword($password);
        $user->generateAuthKey();
        if ($authorized) {
            $user->email_verified_at = date('Y-m-d H:i:s');
        } else {
            $user->generateEmailVerifyToken();
        }
        return $user->save() ? $user : null;
    }
}