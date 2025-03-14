<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tramite_alineamiento_numero".
 *
 * @property int $id
 * @property int $tramite_id
 * @property string $propietario_nombre
 * @property string $propietario_apellidos
 * @property string $propietario_identificacion
 * @property string|null $telefono
 * @property string|null $correo
 * @property string|null $domicilio
 * @property string|null $colonia
 * @property string|null $entre_calles
 * @property string|null $codigo_postal
 * @property string|null $aprovechamiento_predio
 * @property string|null $requisitos
 * @property string|null $estado
 * @property string|null $fecha_aprobacion
 * @property string|null $documentos
 *
 * @property Tramite $tramite
 */
class TramiteAlineamientoNumero extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tramite_alineamiento_numero';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['telefono', 'correo', 'domicilio', 'colonia', 'entre_calles', 'codigo_postal', 'aprovechamiento_predio', 'requisitos', 'fecha_aprobacion', 'documentos'], 'default', 'value' => null],
            [['estado'], 'default', 'value' => 'pendiente'],
            [['tramite_id', 'propietario_nombre', 'propietario_apellidos', 'propietario_identificacion'], 'required'],
            [['tramite_id'], 'default', 'value' => null],
            [['tramite_id'], 'integer'],
            [['aprovechamiento_predio', 'requisitos', 'documentos'], 'string'],
            [['fecha_aprobacion'], 'safe'],
            [['propietario_nombre', 'propietario_apellidos', 'propietario_identificacion', 'correo', 'domicilio', 'colonia', 'entre_calles'], 'string', 'max' => 255],
            [['telefono'], 'string', 'max' => 20],
            [['codigo_postal'], 'string', 'max' => 10],
            [['estado'], 'string', 'max' => 50],
            [['tramite_id'], 'unique'],
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
            'propietario_nombre' => 'Propietario Nombre',
            'propietario_apellidos' => 'Propietario Apellidos',
            'propietario_identificacion' => 'Propietario Identificacion',
            'telefono' => 'Telefono',
            'correo' => 'Correo',
            'domicilio' => 'Domicilio',
            'colonia' => 'Colonia',
            'entre_calles' => 'Entre Calles',
            'codigo_postal' => 'Codigo Postal',
            'aprovechamiento_predio' => 'Aprovechamiento Predio',
            'requisitos' => 'Requisitos',
            'estado' => 'Estado',
            'fecha_aprobacion' => 'Fecha Aprobacion',
            'documentos' => 'Documentos',
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
