<?php
require_once 'app/models/admin.php';
require_once 'app/models/teams.php';
require_once 'app/models/umpires.php';
require_once 'app/views/matchview.php';
require_once 'helpers/auht.helper.php';


class AsociationController {
    private $model_umpire;
    private $model_team;
    private $view;
    private $helper;
    private $authview;

    public function __construct() {
        $this->model_umpire = new UmpireModel();
        $this->model_team = new TeamModel();
        $this->view = new MatchView();
        $this->helper = new AuthHelper();
        $this->authview = new AuthView();
    }

        
    function showteams() {
        $teams = $this->model_team->getAllTeams();
        $this->view->showTeams($teams);
    }
    
    public function showUmpireByAsoc($region){
        $umpires = $this->model_umpire->showUmpireByAsoc($region);
        $this->view->showUmpireByAsoc($umpires); 
    } 
    
              
    function addTeam() {
        $this->helper->checkLoggedIn();        
        // validar entrada de datos
        $equipo = $_POST['equipo'];
        $asociacion = $_POST['asociacion'];
        $region = $_POST['region'];
        if (empty($equipo) || empty($asociacion) || empty($region)) {
            $this->view->showError(array("Hay campos vacios.", "Por favor complete los campos obligatorios para poder agregarlo.",  "showUmpires"));
            die();
        }

        $id = $this->model_team->insertTeam($equipo, $asociacion, $region);
        header("Location: " . BASE_URL . "list-teams"); 
    }
    
    function deleteTeam($id) {
        $this->helper->checkLoggedIn();
        $this->model_team->deleteTeamById($id);
        header("Location: " . BASE_URL . "list-teams");
    }
    
        
    public function showEditFormTeam($id){
        $this->helper->checkLoggedIn();
        $this->authview->showEditFormTeam($id);
    }

    public function EditTeam($id){
        $this->helper->checkLoggedIn();
        if ((!empty($_POST))) {
            $equipo = $_POST['equipo'];
            $asociacion = $_POST['asociacion'];
            $region = $_POST['region'];
            $this->model_team->editTeam($equipo, $asociacion, $region, $id);
            header("Location: " . BASE_URL . "list-teams"); 
        }   
    
}
}

    