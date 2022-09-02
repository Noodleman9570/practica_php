<?php

class View {

    function __construct()
    {
        
    }

    function render($nombre, $data = [])
    {
        $this->d = $data;

        $this->handleMessages();

        require 'views/' . $nombre . '.php';
    }

    private function handleMessages() // validacion para la existencia de algun mensage error o success
    {
        if(isset($_GET['success']) && isset($_GET['error'])){
            //error
        } else if(isset($_GET['success'])){
            $this->handleSuccess();
        } else if(isset($_GET['error'])){
            $this->handleError();
        }
    }

    private function handleError() // validacion y almacenaje de errors
    {
        $hash = $_GET['error'];
        $error = new Errors();

        if($error->existsKey($hash)){
            $this->d['error'] = $error->get($hash);
        }
    }

    private function handleSuccess() // validacion y almacenaje de success
    {
        $hash = $_GET['success'];
        $success = new Success();

        if ($success->existsKey($hash)) {
            $this->d['success'] = $success->get($hash);
        }
    }

    public function showMessages() // llamada a la renderizacion de los mensajes
    {
        $this->showErrors();
        $this->showSuccess();
    }

    public function showErrors() // validacion y renderizacion de errors
    {
        if (array_key_exists('error', $this->d)) {
            error_log($this->d['error']);
            echo '<div class="status_message error">'.$this->d['error'].'</div>';
        }
    }

    public function showSuccess() // validacion y renderizacion de success
    {
        if (array_key_exists('success', $this->d)) {
            error_log($this->d['success']);
            echo '<div class="status_message success">'.$this->d['success'].'</div>';
        }
    }
}