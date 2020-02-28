<?php

    class Login extends dbHandler
    {
        public function signin($user,$pass)
        {
            $query = "SELECT * FROM users WHERE username = :username AND password = :password";
            $pass = md5($pass);
            $params = [
                ':username' => $user,
                'password'  => $pass
            ];

            $user = $this->do_my_query($query, $params);
            return $user;

        }
    }

?>