<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CursosPack */

$this->title = 'Crear Pack';
$this->params['breadcrumbs'][] = ['label' => 'Listado de cursos', 'url' => ['cursos-detalle/index']];
$this->params['breadcrumbs'][] = ['label' => $curso->TITULO, 'url' => ['cursos-detalle/view', 'id' => $curso->CURSO]];
$this->params['breadcrumbs'][] = ['label' => 'Packs', 'url' => ['cursos-pack/index', 'curso' => $curso->CURSO]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cursos-pack-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
