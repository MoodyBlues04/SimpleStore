<?php

namespace app\models\forms\admin;

use yii\base\Exception;
use yii\base\Model;
use yii\rbac\ManagerInterface;
use yii\rbac\Role;

class EditRoleForm extends Model
{
    public string $role = '';
    public array $permissions = [];

    private ManagerInterface $auth;

    public function __construct($config = [])
    {
        parent::__construct($config);
        $this->auth = \Yii::$app->authManager;
    }

    public function rules(): array
    {
        return [
            [['permissions', 'role'], 'required'],
            ['role', 'string'],
            ['role', 'validateRole'],
            ['permissions', 'validatePermissions'],
        ];
    }

    public function validateRole(): void
    {
        if ($this->hasErrors()) {
            return;
        }
        $role = $this->getRole();
        if (is_null($role)) {
            $this->addError('role', 'Incorrect role.');
        }
    }

    public function validatePermissions(): void
    {
        if ($this->hasErrors()) {
            return;
        }
        $permissions = $this->getPermissions();
        foreach ($permissions as $permission) {
            if (null === $this->auth->getPermission($permission)) {
                $this->addError('permissions', 'Incorrect permission.');
            }
        }
    }

    /**
     * @throws Exception
     */
    public function updateRole(): bool
    {
        $role = $this->getRole();
        $this->auth->removeChildren($role);
        foreach ($this->getPermissions() as $permissionName) {
            $permission = $this->auth->getPermission($permissionName);
            $this->auth->addChild($role, $permission);
        }
        return true;
    }

    private function getRole(): ?Role
    {
        return $this->auth->getRole($this->role);
    }

    private function getPermissions(): array
    {
        return array_values($this->permissions);
    }
}