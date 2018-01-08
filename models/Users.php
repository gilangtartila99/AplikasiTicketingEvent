<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 */
class Users extends \yii\db\ActiveRecord// implements yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'authKey', 'accessToken', 'nama'], 'required'],
            [['username', 'password'], 'string', 'max' => 100],
            [['authKey', 'accessToken', 'nama'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'nama' => 'Nama',
        ];
    }

    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)){
           $this->password = md5($this->password);
           return true;
        }else{
           return false;
        }
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        //mencari user login berdasarkan IDnya dan hanya dicari 1.
        $user = Users::findOne($id); 
        if(count($user)){
            return new static($user);
        }
        return null;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        //throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
        return Users::findOne(['authKey' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        //mencari user login berdasarkan username dan hanya dicari 1.
        $user = Users::find()->where(['username'=>$username])->one(); 
        if(count($user)){
            return new static($user);
        }
        return null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === md5($password);
    }
}
