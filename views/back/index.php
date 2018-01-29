<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gestionar Tareas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="back-tareas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Tareas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => 'Mostrando {begin} - {end} de {totalCount} tareas',
        'columns' => [
           
            'id_tarea',
            [
             'attribute' => ' creador ',
             'value' => function ($model, $key, $index, $column){
        
                return User::getName($model -> creador);
        
        
             }
                
                
            ],
            'titulo',
            [
              'attribute' => 'categoria',
              'value' => 'categorias.categoria',
                     
            ], 
            'detalles:ntext',
             [
              'attribute' => 'prioridad',
              'value' => 'prioridades.prioridad',
                     
            ], 
                    
                    
            'estima_duracion',
            [
                'attribute' => 'fecha_inicio',
                'format'    => ['datetime', 'dd-MM-yyyy HH:mm:ss'],
            ],
            [
                'attribute' => 'fecha_limite',
                'format'    => ['datetime', 'dd-MM-yyyy HH:mm:ss'],
            ],
                 [
              'attribute' => 'usuario',
              'value' => 'usuarios.usuario',
              
                     
            ],
            [
             'attribute' => 'done',
              'value' => function ($model, $key, $index, $column){
        
                return $model -> done == 1 ? 'SI' :'NO';
                
              }
                
                
                
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
