<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_tramite".
 *
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 *
 * @property Tramite[] $tramites
 */
class TipoTramite extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_tramite';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion'], 'required'],
            [['descripcion'], 'string'],
            [['nombre'], 'string', 'max' => 255],
            [['nombre'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * Gets query for [[Tramites]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTramites()
    {
        return $this->hasMany(Tramite::class, ['tipo_tramite_id' => 'id']);
    }

}
