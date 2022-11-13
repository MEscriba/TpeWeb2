<?php

class AsociationModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_torneos;charset=utf8', 'root', '');
    }

    /**
     * Devuelve la lista de equipos completa.
     */
    public function getAllAsociations() {
        // 1. abro conexión a la DB
        // ya esta abierta por el constructor de la clase

        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT * FROM asociaciones ORDER BY asociacion ASC");
        $query->execute();

        // 3. obtengo los resultados
        $asociations = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $asociations;
    }
    function getOne($id){
        $query = $this->db->prepare('SELECT * FROM asociaciones WHERE id_asociacion = ?');
        $query-> execute([$id]);
    
        $asociation = $query->fetch(PDO::FETCH_OBJ);
        return $asociation;
    }
    /**
     * Inserta una equipo en la base de datos.
     */
    public function insertAsociation($asociacion, $region) {
        $query = $this->db->prepare("INSERT INTO asociaciones (asociacion, region) VALUES (?, ?)");
        $query->execute([$asociacion, $region]);

        return $this->db->lastInsertId();
    }

    /**
     * Elimina un equipo dado su id.
     */
    function deleteAsociationById($id) {
        $query = $this->db->prepare('DELETE FROM asociaciones WHERE id_asociacion= ?');
        $query->execute([$id]);
    }

    public function editAsociation($asociacion,$region,$id){
        $query = $this->db->prepare("UPDATE asociaciones SET asociacion=?, region=? WHERE id_asociacion=?");
        $query->execute([$asociacion,$region,$id]);
        $asociations = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $asociations;
    }
    
}

