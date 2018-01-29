<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Categorias;
use app\models\Prioridades;
use app\models\User;

// nuevo control de fechas
use kartik\datecontrol\Module;
use kartik\datecontrol\DateControl;


/* @var $this yii\web\View */
/* @var $model app\models\BackTareas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="back-tareas-form col-xs-6 ">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'creador')->dropDownList(
            ArrayHelper::map(User::find()->all(), 'id_usuario', 'usuario'),
            ['prompt' => 'Seleccione el usuario creador de la tarea',
             'value' => Yii::$app-> user -> identity -> id_usuario]
            )  ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

   <?= $form->field($model, 'categoria')->dropDownList(
            ArrayHelper::map(Categorias::find()->all(), 'id_categoria', 'categoria'),
            ['prompt' => 'Seleccione Categoria']
            )   ?>

    <?= $form->field($model, 'detalles')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'prioridad')->dropDownList(
            ArrayHelper::map(Prioridades::find()->all(), 'id_prioridad', 'prioridad'),
            ['prompt' => 'Selecciona la prioridad']
            )  ?>

    <?= $form->field($model, 'estima_duracion')->textInput() ?>

     <?= $form->field($model, 'fecha_inicio')->widget(DateControl::classname(), [
    // 'displayFormat' =>  'php:d-m-Y H:i:s',
    'type'=>DateControl::FORMAT_DATETIME,
    'language' => 'es',    
]); ?>

   <?= $form->field($model, 'fecha_limite')->widget(DateControl::classname(), [
    // 'displayFormat' =>  'php:d-m-Y H:i:s',
    'type'=>DateControl::FORMAT_DATETIME,
    'language' => 'es',    
]); ?>

    <?= $form->field($model, 'usuario')->dropDownList(
            ArrayHelper::map(User::find()->all(), 'id_usuario', 'usuario'),
            ['prompt' => 'Selecciona la prioridad']
            )  ?>
    <?= $form->field($model, 'done')->DropDownList(['0' => 'NO', '1' => 'SI']) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
