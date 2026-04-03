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
class WebhooksConfig extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'webhooks_config';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CURSO', 'ESTADO_MP', 'WEBHOOK_URL'], 'required'],
            [['CURSO'], 'string', 'max' => 300],
            [['ESTADO_MP'], 'string', 'max' => 20],
            [['WEBHOOK_URL'], 'string', 'max' => 100]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'CURSO' => 'ID',
            'ESTADO_MP' => 'Prefijo',
            'WEBHOOK_URL' => 'Ultimo  Num',
        ];
    }
}
