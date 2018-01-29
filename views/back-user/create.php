<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BackUsuario */

$this->title = 'Crear Usuario';
$this->params['breadcrumbs'][] = ['label' => 'Gestión Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="back-usuario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
