<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CursosDetalle */

$this->title = $model->TITULO;
$this->params['breadcrumbs'][] = ['label' => 'Listado de cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cursos-detalle-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->CURSO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->CURSO], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estas seguro de eliminarlo?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'CURSO',
            'DIR',
            'TITULO',
            'DESCRIPCION',
            'PRECIO_UNITARIO',
            'PORCENTAJE_DES',
            'PUBLIC_KEY_MP',
            'ACCESS_TOKEN_MP',
            'URL_DOWNLOAD:url',
            'URL_FACEBOOK_GROUP:url',
        ],
    ]) ?>

</div>
