<?php

use app\models\Session;

require $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";
require ROOT_DIR . "services/Autoloader.php";

spl_autoload_register([new app\services\Autoloader(), 'loadClass']);


$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'] ?: 'index';

$controllerClass = "app\controllers\\" . ucfirst($controllerName) . "Controller";

Session::Start();

if (class_exists($controllerClass)) {
  /** @var \app\controllers\ProductController $controller */
  $controller = new $controllerClass(
    new \app\services\renderers\TemplateRenderer()
  );
  $controller->runAction($actionName);
}
