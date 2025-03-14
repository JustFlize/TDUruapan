<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tramite".
 *
 * @property int $id
 * @property int $usuario_id
 * @property int $tipo_tramite_id
 * @property string $estatus
 * @property string|null $fecha_solicitud
 * @property string|null $fecha_aprobacion
 * @property string|null $observaciones
 * @property string|null $fecha_modificacion
 *
 * @property Documento[] $documentos
 * @property Pago[] $pagos
 * @property TipoTramite $tipoTramite
 * @property TramiteAlineamientoNumero $tramiteAlineamientoNumero
 * @property Usuarios $usuario
 */
class Tramite extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tramite';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha_aprobacion', 'observaciones'], 'default', 'value' => null],
            [['estatus'], 'default', 'value' => 'pendiente'],
            [['usuario_id', 'tipo_tramite_id'], 'required'],
            [['usuario_id', 'tipo_tramite_id'], 'default', 'value' => null],
            [['usuario_id', 'tipo_tramite_id'], 'integer'],
            [['fecha_solicitud', 'fecha_aprobacion', 'fecha_modificacion'], 'safe'],
            [['observaciones'], 'string'],
            [['estatus'], 'string', 'max' => 50],
            [['tipo_tramite_id'], 'exist', 'skipOnError' => true, 'targetClass' => TipoTramite::class, 'targetAttribute' => ['tipo_tramite_id' => 'id']],
            [['usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::class, 'targetAttribute' => ['usuario_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'usuario_id' => 'Usuario ID',
            'tipo_tramite_id' => 'Tipo Tramite ID',
            'estatus' => 'Estatus',
            'fecha_solicitud' => 'Fecha Solicitud',
            'fecha_aprobacion' => 'Fecha Aprobacion',
            'observaciones' => 'Observaciones',
            'fecha_modificacion' => 'Fecha Modificacion',
        ];
    }

    /**
     * Gets query for [[Documentos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentos()
    {
        return $this->hasMany(Documento::class, ['tramite_id' => 'id']);
    }

    /**
     * Gets query for [[Pagos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPagos()
    {
        return $this->hasMany(Pago::class, ['tramite_id' => 'id']);
    }

    /**
     * Gets query for [[TipoTramite]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipoTramite()
    {
        return $this->hasOne(TipoTramite::class, ['id' => 'tipo_tramite_id']);
    }

    /**
     * Gets query for [[TramiteAlineamientoNumero]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTramiteAlineamientoNumero()
    {
        return $this->hasOne(TramiteAlineamientoNumero::class, ['tramite_id' => 'id']);
    }

    /**
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::class, ['id' => 'usuario_id']);
    }

}
