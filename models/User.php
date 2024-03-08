<?php

namespace app\models;

use app\models\traits\HasTimestamps;
use yii\base\Exception;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\rbac\Role;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $auth_key
 * @property string|null $email_verify_token
 * @property string|null $email_verified_at
 * @property string $created_at
 * @property string $updated_at
 */
class User extends ActiveRecord implements IdentityInterface
{
    use HasTimestamps;

    public static function tableName(): string
    {
        return "{{%users}}";
    }

    public static function findIdentity($id): ?User
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null): User
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * @param bool $insert
     * @return bool
     * @throws Exception
     */
    public function beforeSave($insert): bool
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }
        $this->setTimestamps();
        if ($this->isNewRecord) {
            $this->generateAuthKey();
        }
        return true;
    }

    public function rules(): array
    {
        return [
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => self::class, 'message' => 'This username has already been taken.'],

            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => self::class, 'message' => 'This email address has already been taken.'],
        ];
    }

    /**
     * @return string[]
     */
    public function getRoleNames(): array
    {
        $roleNames = array_map(fn(\yii\rbac\Role $role) => $role->name, $this->roles());
        return array_values($roleNames);
    }

    /**
     * @return Role[]
     */
    public function roles(): array
    {
        return \Yii::$app->authManager->getRolesByUser($this->id);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getAuthKey(): string
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey): bool
    {
        return $this->getAuthKey() === $authKey;
    }

    public static function findByEmail(string $email): User
    {
        return static::findOne(['email' => $email]);
    }

    public function validatePassword(string $password): bool
    {
        return \Yii::$app->security->validatePassword($password, $this->password);
    }

    /**
     * @throws Exception
     */
    public function setPassword(string $password): void
    {
        $this->password = \Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     * @throws Exception
     */
    public function generateAuthKey(): void
    {
        $this->auth_key = \Yii::$app->security->generateRandomString();
    }

    public static function findByEmailVerifyToken(string $emailConfirmToken): ?User
    {
        return static::findOne(['email_verify_token' => $emailConfirmToken]);
    }

    /**
     * @throws Exception
     */
    public function generateEmailVerifyToken(): void
    {
        $this->email_verify_token = \Yii::$app->security->generateRandomString();
    }

    public function removeEmailVerifyToken(): void
    {
        $this->email_verify_token = null;
    }
}