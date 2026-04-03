<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CursosDetalle */

$this->title = 'Actualizar curso: ' . $model->TITULO;
$this->params['breadcrumbs'][] = ['label' => 'Listado de cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->TITULO, 'url' => ['view', 'id' => $model->CURSO]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cursos-detalle-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
