<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../repository/UserRepository.php';

class SecurityController extends AppController
{
    public function login()
    {
        $userRepository = new UserRepository();

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        session_start();
        $user = $userRepository->getUser($email);
        if (!$user) {
            return $this->render('login', ['messages' => ['User not exist!']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }
        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password']]);
        }
        $_SESSION['logged_user'] = $user;

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/mainPage");
    }

    public function logout()
    {
        session_start();

        if (!array_key_exists("logged_user", $_SESSION)) {
            $this->render('error', ["message" => "You are not logged in!"]);
            die();
        }

        session_destroy();
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/login");
    }

}