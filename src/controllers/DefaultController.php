<?php

require_once 'AppController.php';

class DefaultController extends AppController{

    public function index(){
        $this->render('login');
    }

    public function register() {
        $this->render('register');
    }

//    public function mainPage() {
//        $this->render('mainPage');
//    }

    public function myData() {
        $this->render('myData');
    }

    public function myEstates() {
        $this->render('myEstates');
    }

    public function favorite() {
        $this->render('favorite');
    }

    public function addNotice() {
        $this->render('addNotice');
    }

    public function announcementDetails() {
        $this->render('announcementDetails');
    }
    
}