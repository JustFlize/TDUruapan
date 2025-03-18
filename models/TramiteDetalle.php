<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class TramiteDetalle extends ActiveRecord
{
    public static function tableName()
    {
        return 'tramite_detalle';
    }

    public function rules()
    {
        return [
            [['propietario_nombre', 'propietario_apellidos', 'propietario_identificacion', 'telefono', 'correo', 'domicilio', 'colonia', 'entre_calles', 'codigo_postal', 'aprovechamiento_predio', 'escritura_numero', 'registro_numero', 'tomo_numero', 'folio_electronico', 'objeto_tramite'], 'required'],
            [['telefono', 'codigo_postal', 'escritura_numero', 'registro_numero', 'tomo_numero', 'folio_electronico'], 'string', 'max' => 20],
            [['correo'], 'email'],
            [['aprovechamiento_predio', 'objeto_tramite'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'propietario_nombre' => 'Nombre del Propietario',
            'propietario_apellidos' => 'Apellidos del Propietario',
            'propietario_identificacion' => 'Identificación del Propietario (INE)',
            'telefono' => 'Teléfono',
            'correo' => 'Correo Electrónico',
            'domicilio' => 'Domicilio para recibir notificaciones',
            'colonia' => 'Colonia/Fraccionamiento/Barrio',
            'entre_calles' => 'Entre Calles o Referencia',
            'codigo_postal' => 'Código Postal',
            'aprovechamiento_predio' => 'Aprovechamiento actual del Predio',
            'escritura_numero' => 'Escritura No.',
            'registro_numero' => 'Registro No.',
            'tomo_numero' => 'Tomo No.',
            'folio_electronico' => 'Folio Electrónico No.',
            'objeto_tramite' => 'Objeto del Trámite',
        ];
    }

    public function getTramite()
    {
        return $this->hasOne(Tramite::class, ['id' => 'tramite_id']);
    }
}