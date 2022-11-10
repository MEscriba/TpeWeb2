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
        $matchController = new UmpireController();
        $matchController->showComplete();
        break;
    case 'list-teams':
        $matchController = new AsociationController();
        $matchController->showTeams();
        break;
    case 'list-umpires':
        $matchController = new UmpireController();
        $matchController->showUmpires();
        break;
    case 'add':
        $admController = new UmpireController();
        $admController->addUmpire();
        break;
    case 'add-team':
        $admController = new AsociationController();
        $admController->addTeam();
        break;
    case 'delete':
        $admController = new UmpireController();
        // obtengo el parametro de la acción
        $id = $params[1];
        $admController->deleteUmpire($id);
        break;
    case 'delete-team':
        $admController = new AsociationController();
        // obtengo el parametro de la acción
        $id = $params[1];
        $admController->deleteTeam($id);
        break;
    //esta esta en fase de prueba aun no me anda
    case 'edit-team':
        $admController = new AsociationController();
        $admController -> EditTeam($params[1]);
        break;
    case 'show-edit-team':
        $admController = new AsociationController();
        $admController->showEditFormTeam($params[1]);
        break;
    case 'show':// mostrar arbitros con params 1
        $matchController = new AsociationController();
        $matchController -> showUmpireByAsoc($params[1]);
        break;
    case 'edit-umpire':
        $admController = new UmpireController();
        $admController -> EditUmpire($params[1]);
        break;
    case 'show-edit-umpire':
        $admController = new UmpireController();
        $admController->showEditFormUmpire($params[1]);
        break;
    default:
        echo('404 Page not found');
        break;
}

