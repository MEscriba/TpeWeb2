<?php
require_once 'app/models/asociations.php';
require_once 'app/models/umpires.php';
require_once 'app/views/general.view.php';
require_once 'helpers/auht.helper.php';


class AsociationController {
    private $model_umpire;
    private $model_asociation;
    private $view;
    private $helper;
    private $authview;

    public function __construct() {
        $this->model_umpire = new UmpireModel();
        $this->model_asociation = new AsociationModel();
        $this->view = new GeneralView();
        $this->helper = new AuthHelper();
        $this->authview = new AuthView();
    }

        
    function showasociations() {
        $asociations = $this->model_asociation->getAllAsociations();
        $this->view->showAsociations($asociations);
    }
     
              
    function addAsociation() {
        $this->helper->checkLoggedIn();        
        // validar entrada de datos
        $asociacion = $_POST['asociacion'];
        $region = $_POST['region'];
        if (empty($asociacion) || empty($region)) {
            $this->view->showError(array("Hay campos vacios.", "Por favor complete los campos obligatorios para poder agregarlo.",  "list-asociations"));
            die();
        }

        $id = $this->model_asociation->insertAsociation($asociacion, $region);
        header("Location: " . BASE_URL . "list-asociations"); 
    }
    
    function deleteAsociation($id) {
        $this->helper->checkLoggedIn();
        $this->model_asociation->deleteAsociationById($id);
        header("Location: " . BASE_URL . "list-asociations");
    }
    
        
    public function showEditFormAsociation($id){
        $this->helper->checkLoggedIn();
        $this->authview->showEditFormAsociation($id);
    }

    public function EditAsociation($id){
        $this->helper->checkLoggedIn();
        if ((!empty($_POST))) {
            $asociacion = $_POST['asociacion'];
            $region = $_POST['region'];
            $this->model_asociation->editAsociation($asociacion, $region, $id);
            header("Location: " . BASE_URL . "list-asociations"); 
        }   
    }
    function showByAsociation($id){
        
        $umpires= $this->model_umpire->getUmpiresByAsoc($id);
        $asociation= $this->model_asociation->getOne($id);
        $asociations = $this->model_asociation->getAllAsociations();
        
        $this->view->showUmpiresByAsoc($umpires,$asociation, $asociations);
        
    }
    
}

    