<?php
require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::post('register', 'SecurityController');
Routing::post('login', 'SecurityController');
Routing::post('authorization', 'SecurityController');
Routing::post('addNotice', 'AnnouncementController');
Routing::post('search', 'AnnouncementController');
Routing::post('filter', 'AnnouncementController');

Routing::get('', 'DefaultController');
Routing::get('myData', 'UserController');
Routing::get('mainPage', 'AnnouncementController');
Routing::get('myEstates', 'AnnouncementController');
Routing::get('announcementDetails', 'AnnouncementController');
Routing::get('logout', 'SecurityController');

Routing::run($path);