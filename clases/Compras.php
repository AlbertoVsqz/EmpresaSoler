<?php
class Compras{
    
    public $id_compras;
    public $fecha;
    public $id_proveedor;
  

    public function __construct($idC="",$fecha="",$idP="") {
        $this->id_compras=$idC;
    $this->fecha=$fecha;
    $this->id_proveedor=$idP;
    
    }
    
    

    public function addCompras(){
     $pdo = Database::getConnection();
       $pdo->setAttribute(PDO::ATTR_ERRMODE,  PDO::ERRMODE_EXCEPTION);
       
       //Esta es unasola linea de codigo concatenada
       $stm = $pdo->prepare(
               "INSERT INTO compras VALUE(:idC,:fecha, :idProvee)");
       $res = $stm->execute(
               array(
                   "idC"=>$this->id_compras,
                   "fecha"=>  $this->fecha,
                   "idProvee"=> $this->id_proveedor,
               )
               );
               return $res;
}

    public function getByCodigo(){
    $pdo = Database::getConnection();
    $sth = $pdo->prepare("SELECT * FROM compras WHERE id=:cod");
    $sth->setFetchMode(PDO::FETCH_CLASS,"Compras");
    $sth->execute(array("cod"=>  $this->id_compras));
    $rows = $sth->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}
    public function getAll(){
    $sql = "SELECT * FROM compras";
    $con =  Database::getConnection();
    $sth = $con->prepare($sql);
    $sth->setFetchMode(PDO::FETCH_CLASS, "Compras");
    $sth->execute();
    $rows = $sth->fetchAll(PDO::FETCH_CLASS);
    return $rows;
 }
    
}

