<?php
require_once './libs/smarty-master/libs/Smarty.class.php';

class AuthView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    function showFormLogin($logged, $error = null) {
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign("error", $error);
        $this->smarty->display('login.tpl');
    }
    public function showEditFormUmpire($id, $asociations, $logged, $umpire){
        $this->smarty->assign("id", $id);
        $this->smarty->assign('asociations', $asociations);
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign("umpire", $umpire);
        $this->smarty->display('formUmpire.tpl');
    }
    public function showEditFormAsociation($id,  $logged, $asociation){
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign("id", $id);
        $this->smarty->assign("asociation", $asociation);
        $this->smarty->display('formAsociation.tpl');
    }
}
