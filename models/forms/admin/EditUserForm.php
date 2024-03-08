<?php

namespace app\models\forms\admin;

use app\models\User;
use yii\base\Model;
use yii\rbac\Role;

class EditUserForm extends Model
{
    public int $id = 0;
    public string $role = '';

    public function rules(): array
    {
        return [
            [['id', 'role'], 'required'],
            ['role', 'string'],
            ['id', 'validateId'],
            ['role', 'validateRole'],
        ];
    }

    /**
     * @throws \Exception
     */
    public function update(): \yii\rbac\Assignment
    {
        return \Yii::$app->authManager->assign($this->getRole(), $this->id);
    }

    private function validateId(): void
    {
        if ($this->hasErrors()) {
            return;
        }
        $user = $this->getUser();
        if (is_null($user)) {
            $this->addError('id', 'Incorrect user id.');
        }
    }

    private function validateRole(): void
    {
        if ($this->hasErrors()) {
            return;
        }
        $role = $this->getRole();
        if (is_null($role)) {
            $this->addError('role', 'Incorrect role.');
        }
    }

    private function getRole(): ?Role
    {
        return \Yii::$app->authManager->getRole($this->role);
    }

    private function getUser(): ?User
    {
        return User::findOne($this->id);
    }
}