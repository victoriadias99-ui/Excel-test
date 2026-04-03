<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "auto_num".
 *
 * @property string $ID
 * @property string $PREFIJO
 * @property int $ULTIMO_NUM
 * @property int $MAX_LEN
 */
class AutoNum extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auto_num';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'PREFIJO', 'ULTIMO_NUM', 'MAX_LEN'], 'required'],
            [['ULTIMO_NUM', 'MAX_LEN'], 'integer'],
            [['ID'], 'string', 'max' => 300],
            [['PREFIJO'], 'string', 'max' => 2],
            [['ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'PREFIJO' => 'Prefijo',
            'ULTIMO_NUM' => 'Ultimo  Num',
            'MAX_LEN' => 'Max  Len',
        ];
    }
}
