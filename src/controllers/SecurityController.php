<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../repository/UserRepository.php';

class SecurityController extends AppController
{
//    private $userRepository;

    public function __construct() {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

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
        $hashedPassword = md5(md5($password));
//            password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));

        if ($user->getPassword() !== $hashedPassword) {
            return $this->render('login', ['messages' => ['Wrong password']]);
        }
        $_SESSION['logged_user'] = $user;

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/mainPage");
    }

    public function register() {

        $userRepository = new UserRepository();

        if (!$this->isPost()) {
            return $this->render('register');
        }

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $country = $_POST['country'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['repeatPassword'];

        $user = $userRepository->getUser($email);

        if($user) {
            return $this->render('register', ['messages' => ['User with this email already exists!']]);
        }

        if ($password !== $confirmPassword) {
            return $this->render('register', ['messages' => ['Passwords don\'t  match!']]);
        }

//        $hashedPassword = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));
        $hashedPassword = md5(md5($password));
        $user_id =20; //TODO ogarnąć id
        $newuser = new User($name, $surname, $email, $country, $hashedPassword);

        var_dump($newuser);
        $this->userRepository->addUser($newuser);

        return $this->render('login', ['messages' => ['Your account has been created!']]);
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