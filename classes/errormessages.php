<?php

class ErrorMessages {
    // ERROR_CONTROLLER_METHOD_ACTION
    const ERROR_ADMIN_NEWCATEGORY_EXISTS = "39e1d94aaae41a3ab7c6f71dd2d6f5e3";
    const ERROR_SIGNUP_NEWUSER = "5Ee1d94aeSF41a3ab7c6f71dd2d6f5s4";
    const ERROR_SIGNUP_NEWUSER_EMPTY = "sdE51681d94aeSF41a3ab7c6f71dd2d6";
    const ERROR_SIGNUP_NEWUSER_EXISTS = "sdddIl681d94aeSF41a3ab7c6f74R8rc";

    private $errorList = [];

    public function __construct()
    {
        $this->errorList = [
            ErrorMessages::ERROR_ADMIN_NEWCATEGORY_EXISTS => 'El nombre de la categoria ya existe, intente otra',
            ErrorMessages::ERROR_SIGNUP_NEWUSER => 'Hubo un error al intentar procesar la solicitud',
            ErrorMessages::ERROR_SIGNUP_NEWUSER_EMPTY => 'Llena los campos de usuario y contraseña',
            ErrorMessages::ERROR_SIGNUP_NEWUSER_EXISTS => 'El nombre de usuario ya existe'
        ];
    }

    public function get($hash)
    {
        return $this->errorList[$hash];
    }

    public function existsKey($key)
    {
        if (array_key_exists($key, $this->errorList)){
            return true;
        } else {
            return false;
        }
    }
}