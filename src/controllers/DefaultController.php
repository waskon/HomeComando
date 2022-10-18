<?php

require_once 'AppController.php';

class DefaultController extends AppController{

    public function index(){
        $this->render('login');
    }

    public function mainPage() {
        $this->render('mainPage');
    }

    public function myData() {
        $this->render('myData');
    }

    public function diet() {
        $this->render('diet');
    }

    public function calendary() {
        $this->render('calendary');
    }
    
}