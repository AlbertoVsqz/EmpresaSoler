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
include './clases/Compras.php';
include './clases/materiaPrima.php';
include './clases/DetalleCompra.php';

if( $_POST['codcompra']==""||$_POST['NomMatPrima']=="" || $_POST['codProveedor']=="" || $_POST['cantcompra']=="" || 
    $_POST['preciomat']=="" || $_POST['fecha']=="" ){
    
    echo 'No se han ingresado todos los datos';
    ?><a href="CompraMatPrima.php"><img src="images/atras.gif" 
    style="border: black solid 3px;" width="250px" height="120px"></a>
    
    
            <?php
}else
{
                $var= $_POST['NomMatPrima'] ;
                    $var2=$_POST['codProveedor'];
               

             $getmat = new MateriaPrima($var);
             $res1 = $getmat->getByCodigoMat();

                     $actualv = $res1[0]->actual_matPrima;
                     $criticov = $res1[0]->critico_matPrima;
                     $diferenciav = $res1[0]->dif_matPrima;
                   

             $actualn = $actualv+$_POST['cantcompra'];
             $criticon=$criticov;

             if($actualn>$criticon){
             $difn= $actualn-$criticon;
             }  else {
                  $difn= $criticon-$actualn;
            }
            
           

            $upmat = new MateriaPrima($var,"",$actualn,$criticon,$difn);
            $resup=$upmat->updatevalores();
            
            if($resup){
                echo $resup;
                  echo 'Se actualizaron '.$resup. ' registros de 4Materia Prima a la base de datos</br>';

            }else{
                echo $resup;
                  echo 'NO Se actualizaron '.$resup. ' registros de4Materia prima a la base de datos</br>';
            }

    $com = new Compras($_POST['codcompra'],$_POST['fecha'], $_POST['codProveedor']);
  if($com->getByCodigo()){
        echo 'no se agrega';
    }else{
        echo 'se agrega';
        if($com->addCompras()){
            echo 'Se agrego Compras a la base de datos</br>';
    }else {
    echo 'Error al ingresar Compras de materia prima proveedores';}
            
    }  
    
    $cos=$_POST['cantcompra'] * $_POST['preciomat'];
    
    $det = new DetalleCompra($_POST['codcompra'],$_POST['NomMatPrima'],$_POST['cantcompra'],$_POST['preciomat'],$cos);
    
        if($det->addDetalleCompras()){
            echo 'Se agrego Detalle Compras a la base de datos</br>';
    }else {
    echo 'Error al ingresar Detalle Compras de materia prima proveedores';}
            
      
    
    
}?>
            <div id="bac">
<a href="index.php"><img src="images/boton-inicio.png" 
     width="150px" height="70px"></a>
     
            <a href="CrearProductos.php?bandera=0&codigo=">
                <img src="images/Banner_VerListadoCompletoMatCrea.jpg" width="100px" height="100px">
                </a>
            
            <a href="FormProduccion.php?bandera=0">
                <img src="images/Banner_VerListadoCompletoPro.jpg"  >
                </a>
            
            <a href="CompraMatPrima.php">
                <img src="images/comprar-ahora3.png" 
                     width="300px" height="140px">
                </a>
            </div>
              
</div>

</body>
</html>