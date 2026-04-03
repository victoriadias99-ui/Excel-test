<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CursosPack */

$this->title = $model->TITULO_1;
$this->params['breadcrumbs'][] = ['label' => 'Listado de cursos', 'url' => ['cursos-detalle/index']];
$this->params['breadcrumbs'][] = ['label' => $curso->TITULO, 'url' => ['cursos-detalle/view', 'id' => $curso->CURSO]];
$this->params['breadcrumbs'][] = ['label' => 'Packs', 'url' => ['cursos-pack/index', 'curso' => $curso->CURSO]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cursos-pack-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estas seguro de eliminar este producto?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'ID_ABRE_PACK',
            'ID_ABRE',
            'TITULO_1',
            'TITULO_2:ntext',
            'DESCRIPCION:ntext',
            'PRECIO',
        ],
    ]) ?>

</div>
