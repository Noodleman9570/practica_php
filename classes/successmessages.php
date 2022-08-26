<?php

class SuccessMessages{

    const PRUEBA = "2333";

    private $successList = [];

    public function __construct()
    {
        $this->successList = [
            SuccessMessages::PRUEBA => 'Este es un mensage de exito'
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