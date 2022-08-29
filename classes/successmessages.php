<?php

class SuccessMessages{

    const PRUEBA = "2333";
    const SUCCESS_SIGNUP_NEWUSER = "sd4DVEl681d94aeSF41a3ab7c6f7SSdt4";

    private $successList = [];

    public function __construct()
    {
        $this->successList = [
            SuccessMessages::PRUEBA => 'Este es un mensage de exito',
            SuccessMessages::SUCCESS_SIGNUP_NEWUSER => 'El usuario ha sido registrado exitosamente'
        ];
    }

    public function get($hash)
    {
        return $this->successList[$hash];
    }

    public function existsKey($key)
    {
        if (array_key_exists($key, $this->successList)){
            return true;
        } else {
            return false;
        }
    }

}