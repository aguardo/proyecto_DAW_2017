<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BackTareas */

$this->title = 'Create Back Tareas';
$this->params['breadcrumbs'][] = ['label' => 'Back Tareas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="back-tareas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
