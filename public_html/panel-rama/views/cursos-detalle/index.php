<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Listado de cursos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cursos-detalle-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear nuevo curso', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'CURSO',
            //'DIR',
            'TITULO',
            //'DESCRIPCION',
            'PRECIO_UNITARIO',
            'PORCENTAJE_DES',
            //'PUBLIC_KEY_MP',
            //'ACCESS_TOKEN_MP',
            'URL_DOWNLOAD',
            'URL_FACEBOOK_GROUP',
            ['class' => 'yii\grid\ActionColumn',
                                        'template' => '{view} {update} {delete} {sublevel}',
                                        'headerOptions' => ['style' => 'width:188px'],
                                        'buttons'=>[
                                            'sublevel'=>function ($url, $model) {
                                                return Html::a('Packs', ['cursos-pack/index', 'curso' => $model->CURSO], ['class' => 'btn btn-xs btn-success']);
                                            },
                                        ],
                                    ],
        ],
    ]); ?>


</div>
