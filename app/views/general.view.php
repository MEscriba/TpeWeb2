<?php
require_once './libs/smarty-master/libs/Smarty.class.php';

class GeneralView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    public function showComplete($umpires, $asociations) {
        // asigno variables al tpl smarty
        $this->smarty->assign('umpires', $umpires); 
        $this->smarty->assign('asociations', $asociations); 
        // mostrar el tpl
        $this->smarty->display('home.tpl');
                
    }
    public function showAsociations($asociations) {
        // asigno variables al tpl smarty
        $this->smarty->assign('asociations', $asociations); 
        // mostrar el tpl
        $this->smarty->display('asociations.tpl');
                
    }
    public function showUmpires($umpires, $asociations) {
        // asigno variables al tpl smarty
        $this->smarty->assign('umpires', $umpires);  
        $this->smarty->assign('asociations', $asociations);
        // mostrar el tpl
        $this->smarty->display('umpires.tpl');
                
    }
    function showUmpire($umpires, $asociations)///aun no esta en uso esta funcion....
    {
        $this->smarty->assign('asociations', $asociations);
        $this->smarty->assign('umpires', $umpires); //esto es para el select del form 

        $this->smarty->display('itemUmpire.tpl');
    }
    
    public function showUmpiresByAsoc($umpires, $asociation, $asociations){
        $this->smarty->assign('umpires', $umpires);
        $this->smarty->assign('asociation', $asociation);
        $this->smarty->assign('asociations', $asociations);
        $this->smarty->display('umpireByAsociation.tpl');
    }
    function showError($error)
    {
        $this->smarty->assign('error', $error);
        $this->smarty->display('error.tpl');
    }
   
}

 

