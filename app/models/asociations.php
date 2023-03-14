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
    public function insertAsociation($asociacion, $region, $image=null) {
        $pathImg = null;
        $pathImg='images/logo_confe.jpg';
        if ($image)
            $pathImg = $this->uploadImage($image);
       
        $query = $this->db->prepare("INSERT INTO asociaciones (`asociacion`, `region`, `image`) VALUES (?, ?, ?)");
        $query->execute([$asociacion, $region,$pathImg]);

        return $this->db->lastInsertId();
    }
    private function uploadImage($image){
        $target = 'images/' . uniqid() . '.jpg';
        move_uploaded_file($image, $target);
        return $target;
    }

    /**
     * Elimina un equipo dado su id.
     */
    function deleteAsociationById($id) {
        $query = $this->db->prepare('DELETE FROM asociaciones WHERE id_asociacion= ?');
        $query->execute([$id]);
    }

    public function editAsociation($asociacion,$region,$item, $id, $image=null){
        $pathImg = null;
        if ($image)
            $pathImg = $this->uploadImage($image);
        else{
            $pathImg=$item;
        }
        $query = $this->db->prepare("UPDATE asociaciones SET `asociacion`=?, `region`=? , `image`=? WHERE id_asociacion=?");
        $query->execute([$asociacion,$region,$pathImg, $id]);
        $asociations = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $asociations;
    }
   
    
}

