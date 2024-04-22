<?php
//import of useful file
require_once 'config/helpers.php';
require_once 'config/database.php';
spl_autoload_register(function($class){
    require_once CONTROLLER . $class . '.php';
});

//Get All parameter of url
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'View';
$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';

//choose controller here
switch ($controllerName) {
    case 'View':
        $controllerClass = "ViewController";
        break;
    case 'Admin':
        $controllerClass = "AdminController";
        break;
    default:
        # code...
        break;
}

//verify file
if (class_exists($controllerClass)) {
    $controller = new $controllerClass();

    // Vérification de l'existence de l'action dans le contrôleur
    if (method_exists($controller, $actionName)) {
        // Appel de l'action dans le contrôleur
        $controller->$actionName();
    } else {
        echo "Action non valide";
    }
} else {
    echo "Contrôleur non valide";
}
