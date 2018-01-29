<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tareas pendientes';
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
            
            

            ['class' => 'yii\grid\ActionColumn',
             'template' => ' {view} {update}',],
        ],
    ]); ?>
</div>
