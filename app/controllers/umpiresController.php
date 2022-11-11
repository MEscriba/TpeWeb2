<?php

require_once 'app/models/asociations.php';
require_once 'app/models/umpires.php';
require_once 'app/views/general.view.php';
require_once 'app/views/auth.view.php';
require_once 'helpers/auht.helper.php';

class UmpireController {
    private $model_umpire;
    private $model_asociation;
    private $view;
    private $authview;
    private $helper;

    public function __construct() {
        $this->model_umpire = new UmpireModel();
        $this->model_asociation = new AsociationModel();
        $this->view = new GeneralView();
        $this->authview = new AuthView();
        $this->helper = new AuthHelper();
    }
    public function showComplete() {
        $umpires = $this->model_umpire->getAllUmpires();
        $asociations = $this->model_asociation->getAllAsociations();
        $this->view->showComplete($umpires, $asociations);
    }

    function showUmpires() {
        $umpires = $this->model_umpire->getAllUmpires();
        $asociations = $this ->model_asociation->getAllAsociations();
        $this->view->showUmpires($umpires, $asociations);
    }
   
    public function showEditFormUmpire($id){
        $this->helper->checkLoggedIn();
        $this->authview->showEditFormUmpire($id);
     }

    function addUmpire() {
        $this->helper->checkLoggedIn();
        // validar entrada de datos
        $arbitro = $_POST['arbitro'];
        $residencia = $_POST['residencia'];
        $id_asociacion = $_POST['id_asociacion'];
        if (empty($arbitro) || empty($residencia) || empty($id_asociacion)) {
            $this->view->showError(array("Hay campos vacios.", "Por favor complete los campos obligatorios para poder agregarlo.",  "showUmpires"));
            die();
        }

        $id = $this->model_umpire->insertUmpire($arbitro, $residencia, $id_asociacion);
        
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
            $residencia = $_POST['residencia'];
            $id_asociacion = $_POST['id_asociacion'];
            $this->model_umpire->editUmpire($arbitro, $residencia, $id_asociacion, $id);
            header("Location: " . BASE_URL . "list-umpires"); 
        }      
    }
    //ver si esto esta ok?
    public function getUmpiresByAsoc($asociacion){
        $umpires = $this->model_umpire->getUmpiresByAsoc($asociacion);
        $this->view->getUmpiresByAsoc($umpires); 
    } 
   
}
   /* veri si se necesita o esta bien-----------------------------
    public function showUmpirebyId($id)
    {
        $this->helper->checkLoggedIn();
        $umpires = $this->model_umpire->getUmpire($id);
        $asociations = $this->model_asociation->getAllAsociations();

        $this->view->showUmpire($umpires, $asociations);
    } */