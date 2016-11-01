<?php
define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';
App::load();

if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'home.index';
}
if($page == 'logout') {
    session_destroy();
    header('Location:index.php');
}

$page = explode('.', $page);


if ($page[0] == 'account' && count($page) > 2) {
    //$class_name = substr($page[1], 0, strlen($page[1]) - 1);
    $controller = '\App\Controller\Account\\' . ucfirst($page[1]) . 'Controller';
    $action = $page[2];
} elseif ($page[0] == 'account' && count($page) == 2) {
    $controller = '\App\Controller\Account\\' . ucfirst($page[0]) . 'Controller';
    $action = $page[1];
} else {
    $controller = '\App\Controller\\' . ucfirst($page[0]) . 'Controller';
    $action = $page[1];
}
$controller = new $controller();
$controller->$action();