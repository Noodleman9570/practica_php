<?php

class Signup extends SessionController {
    function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        $this->view->render('login/signup', []);
    }

    function newUser()
    {
        if($this->existPOST(['username', 'password'])){
            $username = $this->getPost('username');
            $password = $this->getPost('password');

            if ($username == '' || empty($username) || $password == '' || empty($password)) {
                $this->redirect('signup', ['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER_EMPTY]);
            }

            $user = new UserModel();
            $user->setUsername($username);
            $user->setPassword($password);
            $user->setRole('user');

            if($user->exists($username)){
                $this->redirect('signup', ['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER_EMPTY]);
            } else if($user->save()){
                $this->redirect('success', ['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER_EMPTY]);
            } else {
                $this->redirect('signup', ['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER]);
            }
        } else {
            $this->redirect('signup', ['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER]);
        }
    }
}