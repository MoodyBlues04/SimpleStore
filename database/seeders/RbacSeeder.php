<?php

namespace app\database\seeders;

use app\modules\rbac\Permissions;
use app\modules\rbac\Roles;
use yii\rbac\ManagerInterface;
use yii\rbac\Role;

class RbacSeeder
{
    private ManagerInterface $auth;

    public function __construct()
    {
        $this->auth =  \Yii::$app->authManager;
    }

    /**
     * @throws \yii\base\Exception
     * @throws \Exception
     */
    public function seed(): void
    {
        $createProductPermission = $this->createPermission(Permissions::CREATE_PRODUCTS);
        $createVendorPermission = $this->createPermission(Permissions::CREATE_VENDORS);
        $createUserPermission = $this->createPermission(Permissions::CREATE_USERS);


        $managerRole = $this->createRole(Roles::MANAGER_ROLE, [
            $createProductPermission,
            $createVendorPermission
        ]);
        $this->createRole(Roles::ADMIN_ROLE, [
            $createUserPermission,
            $managerRole
        ]);
    }

    /**
     * @throws \Exception
     */
    private function createPermission(string $name): \yii\rbac\Permission
    {
        $permission = $this->auth->createPermission($name);
        $permission->description = $name;
        $this->auth->add($permission);
        return $permission;
    }

    private function createRole(string $name, array $children = []): Role
    {
        $role = $this->auth->createRole($name);
        $this->auth->add($role);
        foreach ($children as $child) {
            $this->auth->addChild($role, $child);
        }
        return $role;
    }
}