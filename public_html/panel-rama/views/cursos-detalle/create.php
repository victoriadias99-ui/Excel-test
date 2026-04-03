<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CursosDetalle */

$this->title = 'Create Cursos Detalle';
$this->params['breadcrumbs'][] = ['label' => 'Cursos Detalles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cursos-detalle-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
