<?php

namespace app\models\forms;

use app\models\User;
use yii\base\Exception;
use yii\base\Model;
use Yii;

class SignupForm extends Model
{
    public string $username;
    public string $email;
    public string $password;

    public function rules(): array
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => User::class, 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => User::class, 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * @throws Exception
     */
    public function signUp(): ?User
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerifyToken();

        if (!$user->save()) {
            return null;
        }

//        TODO config mailing && refactor all

        Yii::$app->mailer->compose('@app/mail/email_confirm', compact('user'))
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
            ->setTo($this->email)
            ->setSubject('Email confirmation for ' . Yii::$app->name)
            ->send();

        return $user;
    }
}