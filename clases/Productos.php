<?php

class Productos{
    public $id_producto;
    public $nom_producto;
    
   
   
    
public function __construct($cod="",$des=""){
    $this->id_producto=$cod;
    $this->nom_producto=$des;
   
    
    
        }
public function addProducto(){
     $pdo = Database::getConnection();
       $pdo->setAttribute(PDO::ATTR_ERRMODE,  PDO::ERRMODE_EXCEPTION);
       
       //Esta es unasola linea de codigo concatenada
       $stm = $pdo->prepare(
               "INSERT INTO productos VALUE(:cod,:des)");
       $res = $stm->execute(
               array(
                   "cod"=>$this->id_producto,
                   "des"=>  $this->nom_producto
                   
                   
               )
               );
               return $res;
}


        public function getAll(){
    $sql = "SELECT * FROM productos";
    $con =  Database::getConnection();
    $sth = $con->prepare($sql);
    $sth->setFetchMode(PDO::FETCH_CLASS, "Productos");
    $sth->execute();
    $rows = $sth->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}

      
        
       public function getByCodigo(){
    $pdo = Database::getConnection();
    $sth = $pdo->prepare("SELECT * FROM productos WHERE id_producto=:cod");
    $sth->setFetchMode(PDO::FETCH_CLASS,"Productos");
    $sth->execute(array("cod"=>  $this->id_producto));
    $rows = $sth->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}
        
}