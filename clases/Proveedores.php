<?php

class Proveedores{
    public $codProvee;
    public $nomProvee;
    public $telefono;
    public $direccion;
    public $email;
   
    
    public function __construct($cod="", $nom="",$tel="",$dir="",$email=""){
    $this->codProvee=$cod;
    $this->nomProvee=$nom;
    $this->telefono=$tel;
    $this->direccion=$dir;
    $this->email=$email;
   
    }
    
    public function addproveedores(){
     $pdo = Database::getConnection();
       $pdo->setAttribute(PDO::ATTR_ERRMODE,  PDO::ERRMODE_EXCEPTION);
       
       //Esta es unasola linea de codigo concatenada
       $stm = $pdo->prepare(
               "INSERT INTO proveedor VALUE(:cod, :nombre, :tel ,:dir ,:email)");
       $res = $stm->execute(
               array(
                   "cod"=>$this->codProvee,
                   "nombre"=> $this->nomProvee,
                   "tel"=>  $this->telefono,
                   "dir"=>  $this->direccion,
                   "email"=>  $this->email
                                  
               )
               );
               return $res;
}
 
public function getByCodigo(){
    $pdo = Database::getConnection();
    $sth = $pdo->prepare("SELECT * FROM proveedor WHERE id_proveedor=:cod");
    $sth->setFetchMode(PDO::FETCH_CLASS,"Proveedores");
    $sth->execute(array("cod"=>  $this->codProvee));
    $rows = $sth->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}
public function getByName(){
    $pdo = Database::getConnection();
    $sth = $pdo->prepare("SELECT * FROM proveedor WHERE id_proveedor=:cod");
    $sth->setFetchMode(PDO::FETCH_CLASS,"Proveedores");
    $sth->execute(array("cod"=>  $this->codProvee));
    $rows = $sth->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}
public function getAll(){
    $sql = "SELECT * FROM proveedor";
    $con =  Database::getConnection();
    $sth = $con->prepare($sql);
    $sth->setFetchMode(PDO::FETCH_CLASS, "Proveedores");
    $sth->execute();
    $rows = $sth->fetchAll(PDO::FETCH_CLASS);
    return $rows;
 }
    
}