<?php

namespace frontend\models;

use yii\base\Model;
use frontend\models\User;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    const  VERCODE_USAGE = 'userRegister';

    public $mobile;
    public $username;
    public $verifyCode;
    public $password;
    public $repassword;
    public $agreement = true;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['mobile', 'trim'],
            ['mobile', 'required'],
            ['mobile', 'match', 'pattern'=>'/^1[34578][0-9]{9}$/','message'=>'请输入正确的手机号'],
            ['mobile', 'unique', 'targetClass' => '\frontend\models\User', 'message' => '此手机号码已注册'],

            ['verifyCode', '\frontend\validators\SmscodeValidator', 'usage' =>self::VERCODE_USAGE],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['repassword', 'compare', 'compareAttribute' => 'password'],

            ['agreement', 'boolean']
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->mobile = $this->mobile;
        $user->username = $this->mobile;
        $user->email = '';
        $user->setPassword($this->password);
        $user->generateAuthKey();

        return $user->save() ? $user : null;
    }
}