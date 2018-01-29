<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\BackUsuario;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gestión Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="back-usuario-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Usuario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => 'Mostrando {begin} - {end} de {totalCount} tareas',
        'columns' => [
          

            'id_usuario',
            'usuario',
            [
             'attribute' => 'password',
              'value' => function ($model, $key, $index, $column){
        
                return '******';
               
              }
                       
            ],
            [
             'attribute' => 'admin',
              'value' => function ($model, $key, $index, $column){
        
                return $model -> admin == 1 ? 'SI' :'NO';
               
              }
                       
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
