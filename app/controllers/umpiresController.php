<?php
require_once 'app/models/admin.php';
require_once 'app/models/teams.php';
require_once 'app/models/umpires.php';
require_once 'app/views/matchview.php';
require_once 'app/views/auth.view.php';
require_once 'helpers/auht.helper.php';

class UmpireController {
    private $model_umpire;
    private $model_team;
    private $view;
    private $authview;
    private $helper;

    public function __construct() {
        $this->model_umpire = new UmpireModel();
        $this->model_team = new TeamModel();
        $this->view = new MatchView();
        $this->authview = new AuthView();
        $this->helper = new AuthHelper();
    }
    public function showComplete() {
        $umpires = $this->model_umpire->getAllUmpires();
        $teams = $this->model_team->getAllTeams();
        $this->view->showComplete($umpires, $teams);
    }

    function showUmpires() {
        $umpires = $this->model_umpire->getAllUmpires();
        $this->view->showUmpires($umpires);
    }
   
    public function showUmpirebyId($id)
    {
        $this->helper->checkLoggedIn();
        $umpires = $this->model_umpire->getUmpire($id);
        $teams = $this->model_team->getAllTeams();

        $this->view->showUmpire($umpires, $teams);
    }
    public function showEditFormUmpire($id){
        $this->helper->checkLoggedIn();
        $this->authview->showEditFormUmpire($id);
    }

    function addUmpire() {
        $this->helper->checkLoggedIn();
        // validar entrada de datos
        $arbitro = $_POST['arbitro'];
        $asociacion = $_POST['asociacion'];
        $region = $_POST['region'];
        if (empty($arbitro) || empty($asociacion) || empty($region)) {
            $this->view->showError(array("Hay campos vacios.", "Por favor complete los campos obligatorios para poder agregarlo.",  "showUmpires"));
            die();
        }

        $id = $this->model_umpire->insertUmpire($arbitro, $asociacion, $region);
        
        header("Location: " . BASE_URL . "list-umpires"); 
    }
   
    function deleteUmpire($id) {
        $this->helper->checkLoggedIn();
        $this->model_umpire->deleteUmpireById($id);
        header("Location: " . BASE_URL. "list-umpires");
    }

   

    public function EditUmpire($id){
        $this->helper->checkLoggedIn();
        if ((!empty($_POST))) {
            $arbitro = $_POST['arbitro'];
            $asociacion = $_POST['asociacion'];
            $region = $_POST['region'];
            $this->model_umpire->editUmpire($arbitro, $asociacion, $region, $id);
            header("Location: " . BASE_URL . "list-umpires"); 
        }      
    }

   
}