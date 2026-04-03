<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\CursosDetalle;

/* @var $this yii\web\View */
/* @var $model app\models\CursosPack */
/* @var $form yii\widgets\ActiveForm */
$var = \yii\helpers\ArrayHelper::map(CursosDetalle::find()->where(['not like', 'CURSO', '|'])->all(), 'CURSO', 'TITULO');

?>

<div class="cursos-pack-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_ABRE_PACK')->dropDownList($var, ['prompt' => 'Seleccione Uno' ]) ?>

    <?php //$form->field($model, 'ID_ABRE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TITULO_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TITULO_2')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'DESCRIPCION')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'PRECIO')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
