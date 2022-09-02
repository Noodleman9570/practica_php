<?php

require_once 'models/loginModel.php';

class Login extends SessionController{

    function __construct()
    {
        parent::__construct();
        error_log('Login::construct -> inicio de Login');
    }

    function render()
    {
        error_log('Login::render -> Carga el index de login');
        $this->view->render('login/index');
    }

    function authenticate(){
        if($this->existPOST(['username', 'password'])){
            $username = $this->getPOST('username');
            $password = $this->getPOST('password');

            if($username == '' || empty($username) || $password == '' || empty($password)){
                $this->redirect('', ['error' => Errors::ERROR_LOGIN_AUTHENTICATE_EMPTY]);
            }

            $login = new LoginModel;
            $user = $login->login($username, $password);

            if($user != NULL){
                $this->initialize($user);
            } else {
                $this->redirect('', ['error' => Errors::ERROR_LOGIN_AUTHENTICATE_DATA]);
            }
        } else {
            $this->redirect('', ['error' => Errors::ERROR_LOGIN_AUTHENTICATE]);
        }
    }

}

