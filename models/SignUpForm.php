<?php

namespace app\models;

use yii\helpers\VarDumper;
use Yii;
use yii\base\Model;

/**
 * SignUpForm is the model behind the sign-up form.
 *
 * @property-read User|null $user
 *
 */
class SignUpForm extends Model
{
    //properties
    public $username;
    public $password;
    public $password_confirmation;

    //override rules
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username'], 'string', 'min' => 3, 'max' => 65],
            [['password', 'password_confirmation'], 'string'],
            ['password_confirmation', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->password = Yii::$app->security->generatePasswordHash($this->password);
            $user->access_token = Yii::$app->security->generateRandomString();
            $user->auth_key = Yii::$app->security->generateRandomString();
            if($user->save()) {
                return $user;
            }
            Yii::error('User not created '. VarDumper::dumpAsString($user->errors));
            return false;
        }
        return null;
    }
}