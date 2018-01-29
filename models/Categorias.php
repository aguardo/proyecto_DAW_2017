<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categorias".
 *
 * @property int $id_categoria
 * @property string $categoria
 */
class Categorias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categorias';
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
            'id_categoria' => 'Id Categoria',
            'categoria' => 'Categoria',
        ];
    }

    /**
     * @inheritdoc
     * @return CQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CQuery(get_called_class());
    }
    
   
}
