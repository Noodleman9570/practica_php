<?php

    class loginModel extends Model
    {
        public function __construct()
        {
            parent::__construct();
        }
        public function login(string $email, string $password)
        {
            // $sql = "SELECT * FROM users WHERE email = :email AND password = :pass LIMIT 1";
            // return ($rows = parent::query($sql,['email'=>$email, 'pass'=>$pass])) ? $rows[0] : [];

            try {
                $query = $this->prepare('SELECT * FROM users WHERE email = :email');
                $query->execute(['email' => $email]);
    
                if ($query->rowCount() == 1) {
                    $item = $query->fetch(PDO::FETCH_ASSOC);
    
                    $user = new UserModel();
                    $user->from($item);
    
                    if(password_verify($password, $user->getPassword())){
                        error_log('LoginModel::login->success');
                        return $user;
                    } else {
                        error_log('LoginModel::login->PASSWORD INCORRECTA');
                        return NULL;
                    }
                }
            } catch (PDOException $e) {
                error_log('LoginModel::login:->exception ' . $e);
                return NULL;
            }
            
        }
    }

?>