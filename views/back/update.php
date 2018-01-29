<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BackTareas */

$this->title = 'Actualizar Tareas';
$this->params['breadcrumbs'][] = ['label' => 'Gestionar Tareas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tarea, 'url' => ['view', 'id' => $model->id_tarea]];
$this->params['breadcrumbs'][] = 'Actualizar Tareas';
?>
<div class="back-tareas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
