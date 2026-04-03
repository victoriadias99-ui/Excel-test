<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Packs';
$this->params['breadcrumbs'][] = ['label' => 'Listado de cursos', 'url' => ['cursos-detalle/index']];
$this->params['breadcrumbs'][] = ['label' => $curso->TITULO, 'url' => ['cursos-detalle/view', 'id' => $curso->CURSO]];
//$this->params['breadcrumbs'][] = ['label' => 'Packs', 'url' => ['cursos-pack/index', 'curso' => $curso->CURSO]];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="cursos-pack-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Pack', ['create','curso' => $curso->CURSO], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'ID',
            'ID_ABRE_PACK',
            //'ID_ABRE',
            'TITULO_1',
            //'TITULO_2:html',
            //'DESCRIPCION:ntext',
            'PRECIO',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
