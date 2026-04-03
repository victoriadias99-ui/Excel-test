<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cursos_pack".
 *
 * @property int $ID
 * @property string $ID_ABRE_PACK
 * @property string $ID_ABRE
 * @property string $TITULO_1
 * @property string $TITULO_2
 * @property string $DESCRIPCION
 * @property float $PRECIO
 */
class CursosPack extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cursos_pack';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_ABRE_PACK', 'ID_ABRE', 'TITULO_1', 'TITULO_2', 'DESCRIPCION', 'PRECIO'], 'required'],
            [['TITULO_2', 'DESCRIPCION'], 'string'],
            [['PRECIO'], 'number'],
            [['ID_ABRE_PACK', 'ID_ABRE'], 'string', 'max' => 64],
            [['TITULO_1'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'ID_ABRE_PACK' => 'Upsell',
            'ID_ABRE' => 'Curso principal',
            'TITULO_1' => 'Titulo 1',
            'TITULO_2' => 'Titulo 2',
            'DESCRIPCION' => 'Descripcion',
            'PRECIO' => 'Precio',
        ];
    }
}
