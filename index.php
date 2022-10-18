<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Router::get('', 'DefaultController');
//Router::get('projects', 'DefaultController');
Router::post('login', 'SecurityController');

Router::get('calendary', 'DefaultController');
Router::get('mainPage', 'DefaultController');
Router::get('myData', 'DefaultController');
Router::get('diet', 'DefaultController');

Router::run($path);