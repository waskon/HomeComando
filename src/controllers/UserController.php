<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../repository/UserRepository.php';

class UserController extends AppController
{

    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function myData()
    {
        $this->checkSession();
        $user = $_SESSION["logged_user"];
        $this->render('myData', ['user' => $user]);
    }

    public function checkSession(): void
    {
        session_start();
        if (!isset($_SESSION) || !array_key_exists("logged_user", $_SESSION)) {
            $this->render('login', ["messages" => ["You are not logged in!"]]);
        }
    }

}

?>
