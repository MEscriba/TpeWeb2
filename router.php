<?php
require_once './app/controllers/asociationsController.php';
require_once './app/controllers/umpiresController.php';
require_once './app/controllers/auth.controller.php';


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);

// tabla de ruteo
switch ($params[0]) {
    case 'login':
        $authController = new AuthController();
        $authController->showFormLogin();
        break;
    case 'validate':
        $authController = new AuthController();
        $authController->validateUser();
        break;
    case 'logout':
        $authController = new AuthController();
        $authController->logout();
        break;    
    case 'home':
        $umpireController = new UmpireController();
        $umpireController->showComplete();
        break;
    case 'list-umpires':
        $umpireController = new UmpireController();
        $umpireController->showUmpires();
        break;
    case 'add':
        $umpireController = new UmpireController();
        $umpireController->addUmpire();
        break;
    case 'delete':
        $umpireController = new UmpireController();
        // obtengo el parametro de la acción
        $id = $params[1];
        $umpireController->deleteUmpire($id);
        break;
    case 'edit-umpire':
        $umpireController = new UmpireController();
        $umpireController->EditUmpire($params[1]);
        break;
    case 'show-edit-umpire':
        $umpireController = new UmpireController();
        $umpireController->showEditFormUmpire($params[1]);
        break;
    case 'show':// mostrar arbitros con params 1 funciona pero hay que chequearlo bien
        $umpireController = new UmpireController();;
        $umpireController -> getUmpiresByAsoc($params[1]);
        break;
    case 'list-asociations':
        $asociationController = new AsociationController();
        $asociationController-> showasociations();
        break;
    case 'add-asociation':
        $asociationController = new AsociationController();
        $asociationController->addAsociation();
        break;
    case 'delete-asociation':
        $asociationController = new AsociationController();
        // obtengo el parametro de la acción
        $id = $params[1];
        $asociationController->deleteAsociation($id);
        break;
    case 'edit-asociation':
        $asociationController = new AsociationController();
        $asociationController -> EditAsociation($params[1]);
        break;
    case 'show-edit-asociation':
        $asociationController = new AsociationController();
        $asociationController->showEditFormTeam($params[1]);
        break;
    default:
        echo('404 Page not found');
        break;
}

