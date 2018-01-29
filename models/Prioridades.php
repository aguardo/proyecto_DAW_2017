<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prioridades".
 *
 * @property int $id
 * @property string $categoria
 *
 * @property Tareas[] $tareas
 */
class Prioridades extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prioridades';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categoria'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categoria' => 'Categoria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTareas()
    {
        return $this->hasMany(Tareas::className(), ['prioridad' => 'id']);
    }

    /**
     * @inheritdoc
     * @return PrioridadesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PrioridadesQuery(get_called_class());
    }
}
