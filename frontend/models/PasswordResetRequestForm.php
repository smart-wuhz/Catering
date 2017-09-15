<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use frontend\models\User;

/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model
{
    const  VERCODE_USAGE = 'userPasswordReset';
    public $mobile;
    public $verifyCode;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['mobile', 'trim'],
            ['mobile', 'required'],
            ['mobile', 'exist',
                'targetClass' => '\frontend\models\User',
                'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => 'There is no user with such mobile.'
            ],
            ['verifyCode', '\frontend\validators\SmscodeValidator', 'usage' =>self::VERCODE_USAGE],
        ];
    }

    /**
     * Sends an VerifyCode , for resetting the password.
     *
     * @return bool whether the email was send
     */
    public function sendVerifyCode()
    {
        /* @var $user User */
        $user = User::findOne([
            'status' => User::STATUS_ACTIVE,
            'mobile' => $this->mobile,
        ]);

        if (!$user) {
            return false;
        }
        
        if (!User::isPasswordResetTokenValid($user->password_reset_token)) {
            $user->generatePasswordResetToken();
            if (!$user->save()) {
                return false;
            }
        }

        /*
         *  Todo 发送验证码
         * */
    }
}
