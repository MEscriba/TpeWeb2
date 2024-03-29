<?php

class AuthHelper {

     /**
     * Verifica que el user este logueado y si no lo está
     * lo redirige al login.
     */
    public function checkLoggedIn() {
        session_start();
        if (!isset($_SESSION['IS_LOGGED'])) {
            header("Location: " . BASE_URL . 'login');
            die();
        }
        
    } 
    
    function isLogged(){
        if (session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }
        return isset($_SESSION['IS_LOGGED']);
    }   
}

