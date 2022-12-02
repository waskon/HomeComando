<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Announcement.php';

class NoticeController extends AppController
{
    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];

    public function addNotice()
    {
        if($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])){

            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $announcement = new Announcement($_POST['title'], $_POST['description'], $_FILES['file']['name'],
                $_POST['price'], $_POST['size']);

        return $this->render("myEstates", ["messages" => $this->messages, 'announcement' => $announcement]);
        }
        $this-> render("addNotice", ['messages' => $this->messages]);
    }

    private function validate(array $file) : bool
    {
        if($file['size'] > self::MAX_FILE_SIZE){
            $this->messages[] = 'File is too large';
            return false;
        }
        if(!isset($file['type']) && !in_array($file['type'], self::SUPPORTED_TYPES)){
            $this->messages[] = 'File type is not supported';
            return false;
        }
        return true;
    }

}