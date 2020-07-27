<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use app\models\behaviors\HashingBehavior;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $firstName
 * @property string $lastName
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property string $publicPassword
 * @property string $publicAuthKey
 */
class Users extends \yii\db\ActiveRecord
{
    public $publicPassword;
    public $publicAuthKey;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstName', 'lastName', 'username', 'password'], 'required'],
            [[
                'firstName',
                'lastName',
                'username',
                'password',
                'authKey',
            ],
                'string',
                'max' => 255
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'username' => 'Username',
            'password' => 'Password',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => HashingBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['password'],
                ],
            ],
            [
                'class' => HashingBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['authKey'],
                ],
            ]
        ];
    }

    public function beforeSave($insert)
    {
        $this->publicPassword = $this->password;
        $this->authKey = Yii::$app->security->generateRandomString(12);
        $this->publicAuthKey = $this->authKey;
        return parent::beforeSave($insert);
    }
}
