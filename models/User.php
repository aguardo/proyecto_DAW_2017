<?php

namespace app\models;
use Yii;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    
    public static function tableName()
    {
        return 'usuarios';
    }
    
    public function rules()
    {
        return [
        ];
    }
    
    public static function findIdentity($id)
    {
        return static::findOne(['id_usuario' => $id]);
    }

    public static function findByUsername($username)
    {
        return static::findOne(['usuario' => $username]);
    }
    

     /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }
    
    /*public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }*/
    
    
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
    
     /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return null;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return null;
    }


   
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }
   
    public static function getName($id){
        
        return static::findOne(['id_usuario' => $id]) -> usuario;
        
    }
    
    public static function isAdmin(){
        
        if(!Yii::$app->user->isGuest){
           return Yii::$app->user->identity -> admin; 
            
        } else {
            
            return 0;
        }
        
        
        
        
    }
    
}
