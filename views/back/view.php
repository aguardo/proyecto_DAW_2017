<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Categorias;
use app\models\User;
use app\models\Prioridades;

/* @var $this yii\web\View */
/* @var $model app\models\BackTareas */

$this->title = $model->id_tarea;
$this->params['breadcrumbs'][] = ['label' => 'Gestionar Tareas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;



?>
<div class="back-tareas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_tarea], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id_tarea], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Está seguro de que quiere borrar la tarea?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_tarea',
            [
               'attribute' => 'creador',
	            'value' => function($model) {
		            return User::getName($model -> creador);
	          } 
                
                
            ],
            'titulo',
             [
	            'attribute' => 'categoria',
	            'value' => function($model) {
		            return  Categorias::find()
                            ->where(['id_categoria' => $model -> categoria])
                             ->one()
                             -> categoria ;;
	            }
            ],     
                    
            'detalles:ntext',
            [
	            'attribute' => 'prioridad',
	            'value' => function($model) {
		            return  Prioridades::find()
                            ->where(['id_prioridad' => $model -> prioridad])
                             ->one()
                             -> prioridad ;
	            }
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
	            'value' => function($model) {
		            return  User::find()
                            ->where(['id_usuario' => $model -> usuario])
                             ->one()
                             -> usuario ;
	            }
            ],
            [
             'attribute' => 'done',
              'value' => function ($model){
        
                return $model -> done == 1 ? 'SI' :'NO';
                
              }
                
                
                
            ],
        ],
    ]) ?>

</div>
