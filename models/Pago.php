<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pago".
 *
 * @property int $id
 * @property int $tramite_id
 * @property float $monto
 * @property string|null $fecha_pago
 * @property string $comprobante_pago
 * @property string|null $referencia_pago
 *
 * @property Tramite $tramite
 */
class Pago extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pago';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['referencia_pago'], 'default', 'value' => null],
            [['tramite_id', 'monto', 'comprobante_pago'], 'required'],
            [['tramite_id'], 'default', 'value' => null],
            [['tramite_id'], 'integer'],
            [['monto'], 'number'],
            [['fecha_pago'], 'safe'],
            [['comprobante_pago', 'referencia_pago'], 'string', 'max' => 255],
            [['tramite_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tramite::class, 'targetAttribute' => ['tramite_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tramite_id' => 'Tramite ID',
            'monto' => 'Monto',
            'fecha_pago' => 'Fecha Pago',
            'comprobante_pago' => 'Comprobante Pago',
            'referencia_pago' => 'Referencia Pago',
        ];
    }

    /**
     * Gets query for [[Tramite]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTramite()
    {
        return $this->hasOne(Tramite::class, ['id' => 'tramite_id']);
    }

}
