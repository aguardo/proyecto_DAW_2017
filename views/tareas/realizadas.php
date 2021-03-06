<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tareas realizadas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tareas-index">

    <h1><?= Html::encode($this->title) ?></h1>

 

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => 'Mostrando {begin} - {end} de {totalCount}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'titulo',
            'detalles:ntext',
            
              [
              'attribute' => 'categoria',
              'value' => 'categorias.categoria',
                     
            ], 
                     
            [
              'attribute' => 'prioridad',
              'value' => 'prioridades.prioridad',
                     
            ], 
           
            'estima_duracion',
            //'fecha_inicio',
             [
                'attribute' => 'fecha_limite',
                'format'    => ['datetime', 'dd-MM-yyyy HH:mm:ss'],
            ],
            
             [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{delete}',
                'urlCreator' => function ($action, $model, $key, $index) {
                if ($action === 'view') {
                    $url = Url::to(['tareas/view3', 'id' => $model->id_tarea]);
                    return $url;
                }
               
                
                if ($action === 'delete') {
                   $url = Url::to(['tareas/delete3', 'id' => $model->id_tarea]);
                   return $url;
                }

              }
                
            ],
        ],
    ]); ?>
</div>
