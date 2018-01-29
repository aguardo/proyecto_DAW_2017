<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property int $id_usuario
 * @property string $usuario
 * @property string $password
 * @property int $admin
 *
 * @property Tareas[] $tareas
 */
class BackUsuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usuario', 'password','admin'], 'required', 'message' => 'Por favor, introduzca {attribute}'],
            [['admin'], 'integer'],
            [['usuario', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => 'Id Usuario',
            'usuario' => 'Usuario',
            'password' => 'Password',
            'admin' => 'Admin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTareas()
    {
        return $this->hasMany(Tareas::className(), ['usuario' => 'id_usuario']);
    }

    /**
     * @inheritdoc
     * @return BackUsuarioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BackUsuarioQuery(get_called_class());
    }
}
