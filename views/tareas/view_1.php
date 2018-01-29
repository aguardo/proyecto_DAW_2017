<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;
use app\models\Categorias;
use app\models\Prioridades;

/* @var $this yii\web\View */
/* @var $model app\models\Tareas */

$this->title = $model->titulo;
$this->params['breadcrumbs'][] = ['label' => 'Tareas creadas', 'url' => ['creadas']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tareas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update1', 'id' => $model->id_tarea], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete1', 'id' => $model->id_tarea], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Está seguro de que quiere borrar la tarea?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'titulo',
            'detalles:ntext',
             
             [
	            'attribute' => 'categoria',
	            'value' => function($model) {
		            return  Categorias::find()
                            ->where(['id_categoria' => $model -> categoria])
                             ->one()
                             -> categoria ;;
	            }
            ],            
            

            

            [
	            'attribute' => 'prioridad',
	            'value' => function($model) {
		            return  Prioridades::find()
                            ->where(['id_prioridad' => $model -> prioridad])
                             ->one()
                             -> prioridad ;;
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
		            return User::findIdentity($model -> usuario) -> usuario;
	            },
                    'label' => 'Asignada a'
            ],
        ],
    ]) ?>

</div>
