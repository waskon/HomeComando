<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('register', 'DefaultController');
Routing::post('login', 'SecurityController');
Routing::post('addNotice', 'NoticeController');

//Routing::get('addNotice', 'DefaultController');
Routing::get('myData', 'DefaultController');
Routing::get('mainPage', 'DefaultController');
Routing::get('myEstates', 'DefaultController');

Routing::run($path);