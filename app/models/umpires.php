<?php

class UmpireModel {

    private $db;
    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_torneos;charset=utf8', 'root', '');
    }
    /**
     * Devuelve la lista de arbitros completa.
     */
    public function getAllUmpires() {
        // 1. abro conexión a la DB
        // ya esta abierta por el constructor de la clase

        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT * FROM arbitros");
        $query->execute();

        // 3. obtengo los resultados
        $umpires = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $umpires;
    }
    function getUmpire($id)
    {
        //pido un arbitro
        $query = $this->db->prepare("SELECT manga.*, genero.nombre, genero.id_genero FROM arbitros INNER JOIN genero ON manga.id_genero_fk=genero.id_genero WHERE manga.id=$id");
        $query->execute();

        $umpire = $query->fetch(PDO::FETCH_OBJ);
        return $umpire;
    }
    /**
     * Inserta el arbitro en la base de datos.
     */
    public function insertUmpire($arbitro, $asociacion, $region) {
        $query = $this->db->prepare("INSERT INTO arbitros (arbitro, asociacion, region) VALUES (?, ?, ?)");
        $query->execute([$arbitro, $asociacion, $region]);

        return $this->db->lastInsertId();
    }

    /**
     * Elimina el arbitro dado su id.
     */
    function deleteUmpireById($id) {
        $query = $this->db->prepare('DELETE FROM arbitros WHERE id = ?');
        $query->execute([$id]);
    }
    /**
     * devuelve arbitros segun la asociacion ESTA MAL LA DEJE POR LAS DUDAS!!!!
     */
   
    public function showUmpireByAsoc($region){
        $query = $this->db->prepare("SELECT * FROM arbitros WHERE region=?");
        $query->execute([$region]);
        $umpires = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $umpires;
    }
    public function editUmpire($arbitro,$asociacion,$region,$id){
        $query = $this->db->prepare("UPDATE arbitros SET arbitro=?, asociacion=?, region=? WHERE id=?");
        $query->execute([$arbitro,$asociacion,$region,$id]);
        $umpires = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $umpires;
    }
}
