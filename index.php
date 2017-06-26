<?php

// Front controller


// Общие настройки
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

// Подключение файлов к системе
define('ROOT', dirname(__FILE__));
require_once(ROOT . '/components/Autoload.php'); /*
require_once(ROOT . '/components/Router.php');
require_once(ROOT . '/components/DB.php');
require_once(ROOT . '/components/DBQuery.php');
require_once(ROOT . '/components/Controller.php');
require_once(ROOT . '/components/Model.php');
require_once(ROOT . '/components/View.php'); */


// Соединение с БД
$db = \components\DB::connect();
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = new \components\DBQuery($db);


// Вызов Router
$router = new \components\Router();
$router->run();

