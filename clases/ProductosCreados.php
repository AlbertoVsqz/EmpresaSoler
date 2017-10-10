<?php
 class ProductosCreados{
     public $idProCreados;
     public $id_Productos;
     public $fecha;
       
public function __construct($cod="",$idPro="",$fecha=""){
    $this->idProCreados=$cod;
    $this->id_Productos=$idPro;
    $this->fecha=$fecha;
   
    
    
        }
public function addProducto(){
     $pdo = Database::getConnection();
       $pdo->setAttribute(PDO::ATTR_ERRMODE,  PDO::ERRMODE_EXCEPTION);
       
       //Esta es unasola linea de codigo concatenada
       $stm = $pdo->prepare(
               "INSERT INTO productoscreados VALUE(:cod,:didpro,:fecha)");
       $res = $stm->execute(
               array(
                   "cod"=>$this->idProCreados,
                   "didpro"=>  $this->id_Productos,
                   "fecha"=>  $this->fecha
                   
               )
               );
               return $res;
}


        public function getAll(){
    $sql = "SELECT * FROM productoscreados";
    $con =  Database::getConnection();
    $sth = $con->prepare($sql);
    $sth->setFetchMode(PDO::FETCH_CLASS, "ProductosCreados");
    $sth->execute();
    $rows = $sth->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}

      
        
       public function getByCodigo(){
    $pdo = Database::getConnection();
    $sth = $pdo->prepare("SELECT * FROM productoscreados WHERE idProCreados=:cod");
    $sth->setFetchMode(PDO::FETCH_CLASS,"Productos");
    $sth->execute(array("cod"=>  $this->idProCreados));
    $rows = $sth->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}
        

}