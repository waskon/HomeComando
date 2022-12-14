<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController
{
    public function login()
    {
//        $user = new User('jsnow@pk.edu.pl', 'admin', 'Johny', 'Snow', 'Poland');
        $userRepository = new UserRepository();

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
//        var_dump($_POST);

        $user = $userRepository->getUser($email);
        if(!$user){
            return $this->render('login', ['messages' => ['User not exist!']]);
        }

        if($user->getEmail() !== $email){
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }
        if($user->getPassword() !== $password){
            return $this->render('login', ['messages' => ['Wrong password']]);
        }

        return $this->render('mainPage');

//        $url = "http://$_SERVER[HTTP_HOST]";
//        header("Location: {$url}/mainPage");
    }

}