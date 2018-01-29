<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BackUsuario */

$this->title = $model->id_usuario;
$this->params['breadcrumbs'][] = ['label' => 'Gestión Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="back-usuario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_usuario], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id_usuario], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Está seguro de que quiere borrar este usuario?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_usuario',
            'usuario',
            [
             'attribute' => 'password',
              'value' => function ($model){
        
                return '******';
               
              }
                       
            ],
           [
             'attribute' => 'admin',
              'value' => function ($model){
        
                return $model -> admin == 1 ? 'SI' :'NO';
                
              }
                
                
                
            ],
        ],
    ]) ?>

</div>
