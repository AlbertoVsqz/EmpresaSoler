<?php
class DetalleCompra{
    
    
    public $id_comprasdet;
    public $id_matPima;
    public $cantidad;
    public $precioUnitario;
    public $costo;

    
    public function __construct( $idComdet="",$idMaPri="", $cant="",$preU="",$cos="") {
      
    
    $this->id_comprasdet=$idComdet;
    $this->id_matPima=$idMaPri;
    $this->cantidad=$cant;
    $this->precioUnitario=$preU;
    $this->costo=$cos;
    }
    
    public function addDetalleCompras(){
     $pdo = Database::getConnection();
       $pdo->setAttribute(PDO::ATTR_ERRMODE,  PDO::ERRMODE_EXCEPTION);
       
       //Esta es unasola linea de codigo concatenada
       $stm = $pdo->prepare(
               "INSERT INTO detallecompras VALUE(:idComDet, :idMat, :cant,:preU,:cos)");
       $res = $stm->execute(
               array(
                  
                   "idComDet"=>  $this->id_comprasdet,
                   "idMat"=> $this->id_matPima,
                   "cant"=>  $this->cantidad,
                   "preU"=>$this->precioUnitario,
                   "cos"=> $this->costo,
                   
                 
               
               )
               );
               return $res;
}

    public function getByCodigo(){
    $pdo = Database::getConnection();
    $sth = $pdo->prepare("SELECT * FROM detallecompras WHERE id_compra=:id");
    $sth->setFetchMode(PDO::FETCH_CLASS,"Compras");
    $sth->execute(array("id"=>  $this->id_comprasdet));
    $rows = $sth->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}
    
}


