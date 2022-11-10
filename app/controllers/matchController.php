<?php
require_once 'app/models/admin.php';
require_once 'app/models/teams.php';
require_once 'app/models/umpires.php';
require_once 'app/views/matchview.php';
require_once 'helpers/auht.helper.php';


class MatchController {
    private $model_umpire;
    private $model_team;
    private $view;
    private $authHelper;

    public function __construct() {
        $this->model_umpire = new UmpireModel();
        $this->model_team = new TeamModel();
        $this->view = new MatchView();
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
      
    function showteams() {
        $teams = $this->model_team->getAllTeams();
        $this->view->showTeams($teams);
    }
    
    public function showUmpireByAsoc($region){
        $umpires = $this->model_umpire->showUmpireByAsoc($region);
        $this->view->showUmpireByAsoc($umpires); 
    } 
    
    function editUmpire($id)
    {
        $this->authHelper->checkLoggedIn();
        $isAdmin = $this->authHelper->isAdmin();
        if (isset($_POST['arbitro']) && !empty($_POST['arbitro']) && isset($_POST['asociacion']) && !empty($_POST['asociacion'])
            && isset($_POST['region']) && !empty($_POST['region'])) {
            if ($isAdmin) {
                $arbitro= $_POST['arbitro'];
                $asociacion = $_POST['asociacion'];
                $region = $_POST['region'];
                $this->model->editUmpire($id, $arbitro, $asociacion, $region);
            }
        }
        header("Location: " . BASE_URL . "formTeam.tpl");
    }       
          
}

