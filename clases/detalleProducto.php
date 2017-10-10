<?php

class DetalleProductos{
    
    public $id_producto;
    public $id_matPrima;
    public $desc_matPrima;
    public $cantidadUsada;
    
    
   
   
    
public function __construct($idprod="",
        $idmat="",$desc="",$cant=""){
    
    $this->id_producto=$idprod;
   $this->id_matPrima=$idmat;
    $this->desc_matPrima=$desc;
    $this->cantidadUsada=$cant;
    
    
    
        }
public function addDetalleProducto(){
     $pdo = Database::getConnection();
       $pdo->setAttribute(PDO::ATTR_ERRMODE,  PDO::ERRMODE_EXCEPTION);
       
       //Esta es unasola linea de codigo concatenada
       $stm = $pdo->prepare(
               "INSERT INTO detalleproductos VALUE(:idprod,
                                            :idmat,:desc,:cant)");
       $res = $stm->execute(
               array(
                   
                   "idprod"=>  $this->id_producto,
                   "idmat"=>  $this->id_matPrima,
                   "desc"=>  $this->desc_matPrima,
                   "cant"=>  $this->cantidadUsada,
                   
                   
               )
               );
               return $res;
}


        public function getAll(){
    $sql = "SELECT * FROM detalleproductos";
    $con =  Database::getConnection();
    $sth = $con->prepare($sql);
    $sth->setFetchMode(PDO::FETCH_CLASS, "DetalleProductos");
    $sth->execute();
    $rows = $sth->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}

        public function updatevalores(){
    
    $con =  Database::getConnection();
    $sth = $con->prepare("UPDATE detalleproductos SET 
               id_detpro=:cod,id_producto=:idprod,
                id_matPrima:idmat,desc_matPrima:desc,cantUsada:cant
                WHERE id_detpro=:cod)");
    
    $sth->execute(array(
        "cod"=>$this->id_detproducto,
                   "idprod"=>  $this->id_producto,
                   "idmat"=>  $this->id_matPrima,
                   "desc"=>  $this->desc_matPrima,
                   "cant"=>  $this->cantidadUsada,
                   
                   
            )
            );
   
    return $sth->rowCount();
}

        
       public function getByCodigo(){
    $pdo = Database::getConnection();
    $sth = $pdo->prepare("SELECT * FROM detalleproductos WHERE id_producto=:cod");
    $sth->setFetchMode(PDO::FETCH_CLASS,"DetalleProductos");
    $sth->execute(array("cod"=>  $this->id_producto));
    $rows = $sth->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}
        
}