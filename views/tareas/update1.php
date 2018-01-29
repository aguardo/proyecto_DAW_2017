<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tareas */

$this->title = 'Actualizar Tareas creadas';
$this->params['breadcrumbs'][] = ['label' => 'Tareas creadas', 'url' => ['creadas']];
$this->params['breadcrumbs'][] = 'Actualizar Tareas creadas';
?>
<div class="tareas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form1', [
        'model' => $model,
    ]) ?>

</div>
