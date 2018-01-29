<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tareas".
 *
 * @property int $id_tarea
 * @property string $creador
 * @property string $titulo
 * @property int $categoria
 * @property string $detalles
 * @property int $prioridad
 * @property double $estima_duracion
 * @property string $fecha_inicio
 * @property string $fecha_limite
 * @property int $usuario
 * @property int $done
 *
 * @property Categorias $categoria0
 * @property Prioridades $prioridad0
 * @property Usuarios $usuario0
 */
class BackTareas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tareas';
    }

    /**
     * @inheritdoc
     */
   
    public function rules()
    {
        return [
            [['creador', 'titulo', 'detalles', 'usuario','categoria','prioridad','estima_duracion','fecha_inicio','fecha_limite'], 'required', 'message' => 'Por favor, introduzca {attribute}'],
            [['categoria', 'prioridad', 'usuario'], 'integer'],
            [['detalles'], 'string'],
            [['estima_duracion'], 'number'],
            [['fecha_inicio', 'fecha_limite','done'], 'safe'],
            [['creador', 'titulo'], 'string', 'max' => 127],
            [['categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categorias::className(), 'targetAttribute' => ['categoria' => 'id_categoria']],
            [['prioridad'], 'exist', 'skipOnError' => true, 'targetClass' => Prioridades::className(), 'targetAttribute' => ['prioridad' => 'id_prioridad']],
            [['usuario'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['usuario' => 'id_usuario']],
        ];
    }
    

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tarea' => 'Id Tarea',
            'creador' => 'Creador de la tarea',
            'titulo' => 'Titulo',
            'categoria' => 'Categoria',
            'detalles' => 'Detalles',
            'prioridad' => 'Prioridad',
            'estima_duracion' => 'Estima Duracion',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_limite' => 'Fecha Limite',
            'usuario' => 'Asignada a',
            'done' => 'Realizada',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategorias()
    {
        return $this->hasOne(Categorias::className(), ['id_categoria' => 'categoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrioridades()
    {
        return $this->hasOne(Prioridades::className(), ['id_prioridad' => 'prioridad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasOne(User::className(), ['id_usuario' => 'usuario']);
    }

    /**
     * @inheritdoc
     * @return BackTareasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BackTareasQuery(get_called_class());
    }
}
