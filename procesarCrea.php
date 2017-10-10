
<!doctype html>
<html>
    <head>
        <title></title>
        <link href="estilos/styles.css" rel="stylesheet" media="screen">
        <meta charset="utf-8">
    </head>
    <body>
        <div id="form">
    
            <?php

include './clases/Database.php';
include './clases/materiaPrima.php';
include './clases/ProductosCreados.php';
include './clases/Productos.php';
include './clases/detalleProducto.php';
$p = new DetalleProductos();
$r = $p->getAll();

foreach ($r as $fila){
          
      if($_POST['cantdis'.$fila->id_matPrima]>$_POST['cantusada'.$fila->id_matPrima]  ){
           
          $nstok = $_POST['cantdis'.$fila->id_matPrima]-$_POST['cantusada'.$fila->id_matPrima];
          
          
             if($nstok>$_POST['cri'.$fila->id_matPrima]){
             $difn= $nstok-$_POST['cri'.$fila->id_matPrima];
             }  else {
                  $difn= $_POST['cri']-$nstok;
            }
            
            $upmat = new MateriaPrima($_POST['idmat'.$fila->id_matPrima],"",$nstok,$_POST['cri'.$fila->id_matPrima],$difn);
            $resup=$upmat->updatevalores();
            
            if($resup){
                echo $resup;
                  echo 'Se actualizaron '.$resup. ' registros de 4Materia Prima a la base de datos</br>';

            }else{
                echo $resup;
                  echo 'NO Se actualizaron '.$resup. ' registros de4Materia prima a la base de datos</br>';
            }

          
            $concat =$_POST['idPro'.$fila->id_matPrima]."PC";
            $proCrea = new ProductosCreados($concat,$_POST['idPro'.$fila->id_matPrima], $_POST['fecha']);
            if($proCrea->getByCodigo()){
        echo 'no se agrega';
    }else{
        echo 'se agrega';
        if($proCrea->addProducto()){
            echo 'Se agrego Productos a la base de datos</br>';
    }else {
    echo 'Error al ingresar Productos de materia prima proveedores';
    
    }
    }        
     
}  else {
      echo 'NO SE PUEDE CREAR POR FALTA MATERIA PRIMA</br>';
        echo '<h1><a href="CompraMatPrima.php">COMPRAR MATERIA PRIMA</a><h1>';
}
    }

?>
            <div id="bac">
<a href="index.php"><img src="images/boton-inicio.png" 
    width="150px" height="70px"></a>
                <a href="CrearProductos.php?bandera=0&codigo=">
                <img src="images/Banner_VerListadoCompletoMatCrea.jpg"  >
                </a>
                     
            </div>

          
</div>

</body>
</html>