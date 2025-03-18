<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notificacion".
 *
 * @property int $id
 * @property int $usuario_id
 * @property string $mensaje
 * @property bool $leida
 * @property string|null $fecha_creacion
 *
 * @property Usuarios $usuario
 */
class Notificacion extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notificacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['leida'], 'default', 'value' => 0],
            [['usuario_id', 'mensaje'], 'required'],
            [['usuario_id'], 'default', 'value' => null],
            [['usuario_id'], 'integer'],
            [['mensaje'], 'string'],
            [['leida'], 'boolean'],
            [['fecha_creacion'], 'safe'],
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
            'mensaje' => 'Mensaje',
            'leida' => 'Leida',
            'fecha_creacion' => 'Fecha Creacion',
        ];
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
