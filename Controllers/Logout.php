<?php

    class Logout extends Controllers
    {
        public function logout()
        {
            Auth::logout();
        }

    }
?>