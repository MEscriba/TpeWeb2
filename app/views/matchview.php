<?php
require_once './libs/smarty-master/libs/Smarty.class.php';

class MatchView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    public function showComplete($umpires, $teams) {
        // asigno variables al tpl smarty
        $this->smarty->assign('umpires', $umpires); 
        $this->smarty->assign('teams', $teams); 
        // mostrar el tpl
        $this->smarty->display('home.tpl');
                
    }
    public function showTeams($teams) {
        // asigno variables al tpl smarty
        /*  $this->smarty->assign('umpires', $umpires); //esto es para el select del form lo comente por si me sirve luego*/
        $this->smarty->assign('teams', $teams); 
        // mostrar el tpl
        $this->smarty->display('teams.tpl');
                
    }
    public function showUmpires($umpires) {
        // asigno variables al tpl smarty
        $this->smarty->assign('umpires', $umpires);  
        
        // mostrar el tpl
        $this->smarty->display('umpires.tpl');
                
    }
    function showUmpire($umpires, $teams)
    {
        $this->smarty->assign('teams', $teams);
        $this->smarty->assign('umpires', $umpires); //esto es para el select del form 

        $this->smarty->display('itemUmpire.tpl');
    }
    //este es el de caetano
    public function showEditFormTeam($id){
        $this->smarty->assign('id', $id);
        $this->smarty->display('formTeam.tpl');

    }
    public function showUmpireByAsoc($umpires){
        $this->smarty->assign('umpires', $umpires);
        $this->smarty->display('umpires.tpl');
    }
    function showError($error)
    {
        $this->smarty->assign('error', $error);
        $this->smarty->display('error.tpl');
    }
    function listMangasFromThisGenre($mangas){    
        $this->smarty->assign('mangas', $mangas);
        $this->smarty->display('mangasFromGenre.tpl'); 

    }
}

 
/*  public function showMatchs($umpires, $teams) {
     // asigno variables al tpl smarty
     $this->smarty->assign('umpires', $umpires); 
     $this->smarty->assign('teams', $teams); 
     // mostrar el tpl
     $this->smarty->display('matchs.tpl');
             
 } */
