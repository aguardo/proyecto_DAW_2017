<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tareas */

$this->title = 'Actualizar Tareas pendientes';
$this->params['breadcrumbs'][] = ['label' => 'Tareas pendientes', 'url' => ['pendientes']];
$this->params['breadcrumbs'][] = 'Actualizar Tareas pendientes';
?>
<div class="tareas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
