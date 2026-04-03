<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CursosDetalle */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cursos-detalle-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CURSO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DIR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TITULO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DESCRIPCION')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PRECIO_UNITARIO')->textInput() ?>

    <?= $form->field($model, 'PORCENTAJE_DES')->textInput() ?>

    <?= $form->field($model, 'PUBLIC_KEY_MP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ACCESS_TOKEN_MP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'URL_DOWNLOAD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'URL_FACEBOOK_GROUP')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
