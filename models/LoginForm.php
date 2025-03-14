<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Usuarios;

/**
 * Modelo para el formulario de inicio de sesión.
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;

    /**
     * Reglas de validación.
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Valida la contraseña ingresada.
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Usuario o contraseña incorrectos.');
            }
        }
    }

    /**
     * Inicia sesión con los datos ingresados.
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        return false;
    }

    /**
     * Busca el usuario en la base de datos.
     * 
     * @return Usuarios|null
     */
    protected function getUser()
    {
        if ($this->_user === false) {
            // Cambié aquí para devolver null si el usuario no es encontrado
            $this->_user = Usuarios::findByUsername($this->username);
        }

        return $this->_user;
    }
}
