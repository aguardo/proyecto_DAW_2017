<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tareas */

$this->title = 'Crear Tareas';

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tareas-create">
    


    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form1', [
        'model' => $model,
    ]) ?>


    
</div>
