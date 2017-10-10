<?php

class MateriaPrima{
    public $codigo;
    public $descripcion;
    public $materiaPrimaActual;
    public $materiaPrimaCritico;
    public $difActualCritico;
   
   
    
public function __construct($cod="",$des="", $act="", 
        $cri="", $dif=""){
    $this->codigo=$cod;
    $this->descripcion=$des;
    $this->materiaPrimaActual=$act;
    $this->materiaPrimaCritico=$cri;
    $this->difActualCritico=$dif;
    
    
        }
public function addMatPrima(){
     $pdo = Database::getConnection();
       $pdo->setAttribute(PDO::ATTR_ERRMODE,  PDO::ERRMODE_EXCEPTION);
       
       //Esta es unasola linea de codigo concatenada
       $stm = $pdo->prepare(
               "INSERT INTO materiaprima VALUE(:cod,:des, :actual, :critico,"
               . ":dif)");
       $res = $stm->execute(
               array(
                   "cod"=>$this->codigo,
                   "des"=>  $this->descripcion,
                   "actual"=> $this->materiaPrimaActual,
                   "critico"=>  $this->materiaPrimaCritico,
                   "dif"=> $this->difActualCritico,
                   
               )
               );
               return $res;
}


        public function getAll(){
    $sql = "SELECT * FROM materiaprima";
    $con =  Database::getConnection();
    $sth = $con->prepare($sql);
    $sth->setFetchMode(PDO::FETCH_CLASS, "materiaPrima");
    $sth->execute();
    $rows = $sth->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}

        public function updatevalores(){
    
    $con =  Database::getConnection();
    $sth = $con->prepare("UPDATE materiaprima SET 
               actual_matprima=:actual, critico_matPrima=:critico,
               dif_matPrima=:dif WHERE id_matPrima=:id");
    
    $sth->execute(array(
        "id"=> $this->codigo,
      
        "actual"=>  $this->materiaPrimaActual,
        "critico"=> $this->materiaPrimaCritico,
        "dif"=>  $this->difActualCritico
        
            )
            );
   
    return $sth->rowCount();
}

        
        public function getMatCritico(){
            $sql = "SELECT * FROM materiaprima WHERE actual_matPrima <= critico_matPrima";
    $con =  Database::getConnection();
    $sth = $con->prepare($sql);
    $sth->setFetchMode(PDO::FETCH_CLASS, "materiaPrima");
    $sth->execute();
    $rows = $sth->fetchAll(PDO::FETCH_CLASS);
    return $rows;
            
        }
        
       public function getByCodigoMat(){
    $pdo = Database::getConnection();
    $sth = $pdo->prepare("SELECT * FROM materiaprima WHERE id_matPrima=:cod");
    $sth->setFetchMode(PDO::FETCH_CLASS,"materiaPrima");
    $sth->execute(array("cod"=>  $this->codigo));
    $rows = $sth->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}
        
}