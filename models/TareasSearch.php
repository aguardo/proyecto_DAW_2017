<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\Models\Tareas;

/**
 * TareasSearch represents the model behind the search form of `app\Models\Tareas`.
 */
class TareasSearch extends Tareas
{
    /**
     * @inheritdoc
     */
    
    public $categoria;
    
    public function rules()
    {
        return [
            [['id_tarea', 'categoria', 'prioridad', 'usuario'], 'integer'],
            [['creador', 'titulo', 'detalles', 'fecha_inicio', 'fecha_limite','categoria'], 'safe'],
            [['estima_duracion'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Tareas::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_tarea' => $this->id_tarea,
            'categoria' => $this->categoria,
            'prioridad' => $this->prioridad,
            'estima_duracion' => $this->estima_duracion,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_limite' => $this->fecha_limite,
            'usuario' => $this->usuario,
        ]);

        $query->andFilterWhere(['like', 'creador', $this->creador])
            ->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'detalles', $this->detalles]);

        return $dataProvider;
    }
}
