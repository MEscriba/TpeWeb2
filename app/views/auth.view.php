<?php
require_once './libs/smarty-master/libs/Smarty.class.php';

class AuthView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    function showFormLogin($error = null) {
        $this->smarty->assign("error", $error);
        $this->smarty->display('login.tpl');
    }
    public function showEditFormUmpire($id){
        $this->smarty->assign("id", $id);
        $this->smarty->display('formUmpire.tpl');
    }
    public function showEditFormTeam($id){
        $this->smarty->assign("id", $id);
        $this->smarty->display('formTeam.tpl');
    }
}
