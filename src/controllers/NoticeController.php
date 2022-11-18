<?php

require_once 'AppController.php';

class NoticeController extends AppController
{
    public function addNotice()
    {
        $this-> render("addNotice");
    }

}