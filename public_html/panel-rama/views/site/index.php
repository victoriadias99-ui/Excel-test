<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Bienvenido al Panel Rama';
?>
<div class="site-index">
    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">¡Bienvenido al Panel Rama!</h1>
        <?= Html::a('Listado de cursos', ['cursos-detalle/index'], ['class' => 'btn btn-success']) ?>
    </div>
</div>
