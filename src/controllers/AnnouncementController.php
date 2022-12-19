<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Announcement.php';
require_once __DIR__ . '/../repository/AnnouncementRepository.php';

class AnnouncementController extends AppController
{
    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];
    private $announcementRepository;

    public function __construct()
    {
        parent::__construct();
        $this->announcementRepository = new AnnouncementRepository();
    }

    public function mainPage()
    {
        $announcements = $this->announcementRepository->getNotices();
        $this->render('mainPage', ['announcements' => $announcements]);
    }

    public function addNotice()
    {
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {

            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__) . self::UPLOAD_DIRECTORY . $_FILES['file']['name']
            );

            $announcement = new Announcement($_POST['title'], $_POST['description'], $_FILES['file']['name'],
                $_POST['price'], $_POST['size'], $_POST['phoneNumber'], $_POST['propertyType'], $_POST['purpose']);

            return $this->render("myEstates", ["messages" => $this->messages, 'announcement' => $announcement]);
        }
        $this->render("addNotice", ['messages' => $this->messages]);
    }

    public function search()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);
            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->announcementRepository->getAnnouncementByTitle($decoded['search']));
        }
    }

    public function filter()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);
            header('Content-type: application/json');
            http_response_code(200);

            if ($decoded['purpose'] == "") {
                echo json_encode($this->announcementRepository->getFilteredByPriceAndSize($decoded['size'], $decoded['maxPrice']));
            } else {
                echo json_encode($this->announcementRepository->getAllFilters($decoded['purpose'], $decoded['size'], $decoded['maxPrice']));
            }
        }
    }

    private function validate(array $file): bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->messages[] = 'File is too large';
            return false;
        }
        if (!isset($file['type']) && !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->messages[] = 'File type is not supported';
            return false;
        }
        return true;
    }

}