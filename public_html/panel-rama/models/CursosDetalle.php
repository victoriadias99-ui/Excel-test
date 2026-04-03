<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cursos_detalle".
 *
 * @property string $CURSO
 * @property string|null $DIR
 * @property string $TITULO
 * @property string $DESCRIPCION
 * @property float $PRECIO_UNITARIO
 * @property float $PORCENTAJE_DES
 * @property string $PUBLIC_KEY_MP
 * @property string $ACCESS_TOKEN_MP
 * @property string $URL_DOWNLOAD
 * @property string|null $URL_FACEBOOK_GROUP
 */
class CursosDetalle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cursos_detalle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CURSO', 'TITULO', 'DESCRIPCION', 'PRECIO_UNITARIO', 'PORCENTAJE_DES', 'PUBLIC_KEY_MP', 'ACCESS_TOKEN_MP'], 'required'],
            [['PRECIO_UNITARIO', 'PORCENTAJE_DES'], 'number'],
            [['CURSO'], 'string', 'max' => 256],
            [['DIR'], 'string', 'max' => 512],
            [['TITULO'], 'string', 'max' => 512],
            [['DESCRIPCION', 'URL_DOWNLOAD', 'URL_FACEBOOK_GROUP'], 'string', 'max' => 1024],
            [['PUBLIC_KEY_MP', 'ACCESS_TOKEN_MP'], 'string', 'max' => 1024],
            [['CURSO'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'CURSO' => 'Identificador',
            'DIR' => 'Dirección',
            'TITULO' => 'Titulo',
            'DESCRIPCION' => 'Descripcion',
            'PRECIO_UNITARIO' => 'Precio  Unitario',
            'PORCENTAJE_DES' => 'Descuento',
            'PUBLIC_KEY_MP' => 'Public  Key  Mp',
            'ACCESS_TOKEN_MP' => 'Access  Token  Mp',
            'URL_DOWNLOAD' => 'Url  Download',
            'URL_FACEBOOK_GROUP' => 'Url  Facebook  Group',
        ];
    }
}
