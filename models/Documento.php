<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "documento".
 *
 * @property int $id
 * @property int $tramite_id
 * @property string $nombre_archivo
 * @property string $ruta_archivo
 * @property string $tipo_documento
 * @property string|null $estado
 * @property string|null $fecha_subida
 *
 * @property Tramite $tramite
 */
class Documento extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'documento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['estado'], 'default', 'value' => 'pendiente'],
            [['tramite_id', 'nombre_archivo', 'ruta_archivo', 'tipo_documento'], 'required'],
            [['tramite_id'], 'default', 'value' => null],
            [['tramite_id'], 'integer'],
            [['fecha_subida'], 'safe'],
            [['nombre_archivo', 'ruta_archivo', 'tipo_documento'], 'string', 'max' => 255],
            [['estado'], 'string', 'max' => 50],
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
            'nombre_archivo' => 'Nombre Archivo',
            'ruta_archivo' => 'Ruta Archivo',
            'tipo_documento' => 'Tipo Documento',
            'estado' => 'Estado',
            'fecha_subida' => 'Fecha Subida',
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
