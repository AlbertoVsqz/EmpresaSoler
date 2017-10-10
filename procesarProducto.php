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
include './clases/DetalleProducto.php';
include './clases/Productos.php';
$getall = new MateriaPrima();
$res3 = $getall->getAll();
if($res3){
    foreach ($res3 as $row){
  if( $_POST['codigopro']==""||$_POST['descripcionpro']=="" || $_POST['nommat'.$row->id_matPrima]=="" 
          || $_POST['cantmat'.$row->id_matPrima]=="" ){
    
    echo 'No se han ingresado todos los datos</br>';
    ?>  
            <a href="NuevoProducto.php"><img src="images/atras.gif" 
    width="150px" height="70px"></a>
    
            <?php
}else{
    echo 'Si estan todos</br>';
            $produc = new Productos($_POST['codigopro'], $_POST['descripcionpro']);
            if($produc->getByCodigo()){
        echo 'no se agrega</br>';
        echo 'ya existe un producto con ese codigo</br>';
         
    }else{
        echo 'se agrega</br>';
        if($produc->addProducto()){
            echo 'Se agrego Productos a la base de datos</br>';
    }else {
    echo 'Error al ingresar Productos de materia prima proveedores</br>';}
    }        
     
            
       
        $detprod = new DetalleProductos($_POST['codigopro'], $row->id_matPrima,$row->desc_matPrima,
       
        $_POST['cantmat'.$row->id_matPrima]);

        echo 'se agrega</br>';
            if($detprod->addDetalleProducto()){
                
                  echo 'Se ingresaron  registros de detalle Producto a la base de datos</br>';

            }else{
                
                  echo 'NO Se actualizaron  registros de detalle Productos prima a la base de datos</br>';
            }
        
    }

}
    }


?></div>
        <div id="bac">
<a href="index.php"><img src="images/boton-inicio.png" 
    width="150px" height="70px"></a>
    
              <a href="FormProduccion.php?bandera=0">
                <img src="images/Banner_VerListadoCompletoPro.jpg"  >
                </a>
            <a href="CrearProductos.php?bandera=0&codigo=">
                <img src="images/Banner_VerListadoCompletoMatCrea.jpg"  >
                </a>
</div>

</body>
</html>