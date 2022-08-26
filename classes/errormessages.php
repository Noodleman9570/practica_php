<?php

class ErrorMessages {
    // ERROR_CONTROLLER_METHOD_ACTION
    const ERROR_ADMIN_NEWCATEGORY_EXISTS = "39e1d94aaae41a3ab7c6f71dd2d6f5e3";

    private $errorList = [];

    public function __construct()
    {
        $this->errorList = [
            ErrorMessages::ERROR_ADMIN_NEWCATEGORY_EXISTS => 'El nombre de la categoria ya existe, intente otra'
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