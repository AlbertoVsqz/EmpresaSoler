<?php
class MateriaPorProveedor{
    
    public $id;
    public $idMatPrima;
    public $idProveedor;
    
    public function __construct($id="",$idMat="",$idPro="") {
        $this->id=$id;
        $this->idMatPrima=$idMat;
        $this->idProveedor=$idPro;
    }
    public function addMatPrima(){
     $pdo = Database::getConnection();
       $pdo->setAttribute(PDO::ATTR_ERRMODE,  PDO::ERRMODE_EXCEPTION);
       
       //Esta es unasola linea de codigo concatenada
       $stm = $pdo->prepare(
               "INSERT INTO matprimaxproveedor VALUE(:id,:idmat, :idpro)");
       $res = $stm->execute(
               array(
                   "id"=>$this->id,
                   "idmat"=>  $this->idMatPrima,
                   "idpro"=> $this->idProveedor
                   
               )
               );
               return $res;
}


        public function getAll(){
    $sql = "SELECT * FROM matprimaxproveedor";
    $con =  Database::getConnection();
    $sth = $con->prepare($sql);
    $sth->setFetchMode(PDO::FETCH_CLASS, "materiaPrima");
    $sth->execute();
    $rows = $sth->fetchAll(PDO::FETCH_CLASS);
    return $rows;
 }
        
             
       public function getByCodigoMatxProvee(){
    $pdo = Database::getConnection();
    $sth = $pdo->prepare("SELECT * FROM matprimaxproveedor WHERE id=:cod");
    $sth->setFetchMode(PDO::FETCH_CLASS,"MateriaPorProveedor");
    $sth->execute(array("cod"=>  $this->id));
    $rows = $sth->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}
public function getByCodigoMatPrima(){
    $pdo = Database::getConnection();
    $sth = $pdo->prepare("SELECT * FROM matprimaxproveedor WHERE id_matPrima=:codmat");
    $sth->setFetchMode(PDO::FETCH_CLASS,"MateriaPorProveedor");
    $sth->execute(array("codmat"=>  $this->idMatPrima));
    $rows = $sth->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}
public function getByCodigoProvee(){
    $pdo = Database::getConnection();
    $sth = $pdo->prepare("SELECT * FROM matprimaxproveedor WHERE id_proveedor=:codpro");
    $sth->setFetchMode(PDO::FETCH_CLASS,"MateriaPorProveedor");
    $sth->execute(array("codpro"=>  $this->idProveedor));
    $rows = $sth->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}
        
}
    

