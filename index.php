<?php

define('ROOT',dirname(__FILE__)); //путь к корню

include_once ROOT.'/components/Router.php';
require_once ROOT.'/components/Db.php';
session_start();


$router = new Router();
$router->run();

