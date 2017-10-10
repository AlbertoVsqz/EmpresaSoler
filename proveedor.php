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

include_once './clases/Database.php';
include_once './clases/materiaPrima.php';
include_once './clases/Proveedores.php';
include_once './clases/materia_X_proveedor.php';


if($_GET['bandera']==0){
    
    $matxprovee = new MateriaPorProveedor("",$_GET['codigo']);
    $res = $matxprovee->getByCodigoMatPrima();
    
    if($res){
    foreach ($res as $fila){
        
         $idprovee=$res[0]->id_proveedor;
         
    $provee = new Proveedores($idprovee);
    $res2 = $provee->getByCodigo();
    
    if($res2){
         ?>
    <table border= "1">
    <tr>
        <td>Codigo del Proveedor</td>
        <td>Nombre del Proveedor</td>
        <td>Telefono</td>
        <td>Direccion</td>
        <td>Email</td>
        <td>Action</td>
        <td>Action</td>
    </tr>
    <?php 
    foreach ($res2 as $fila2){
    ?>    
    <tr>
        
        <td ><?=$fila2->id_proveedor?></td>
        <td><?=$fila2->nombre?></td>
        <td><?=$fila2->telefono?></td>
        <td><?=$fila2->direccion?></td>
        <td><?=$fila2->email?></td>
     
        <td><a href="proveedor.php?codigo=<?=$fila2->id_proveedor?>&bandera=1">Ver Materias Prima de este Proveedor</a></td>
        
        
    </tr>
    <?php
      }
    ?>
</table>

    <?php 
    
    }
    }
     
      
    ?> 
            <a href="FormCompras.php?bandera=0"><img src="images/atras.gif" 
    width="150px" height="70px"></a>
            
<a href="index.php"><img src="images/boton-inicio.png" 
    width="150px" height="70px"></a>
    <?php
       
    }else{
         echo '<h3>Error en los parametros</h3>';?>
            <a href="FormCompras.php?bandera=0"><img src="images/atras.gif" 
    width="150px" height="70px"></a>
        
         <?php
    }
}
        

//else
//{
  //header("location: index.php");
   
//}

if($_GET['bandera']==1){
    $matxprovee = new MateriaPorProveedor("","",$_GET['codigo']);
    $res = $matxprovee->getByCodigoProvee();
      ?>
    <table border= "1">
    <tr>
        <td>Codigo</td>
        <td>Descripcion</td>
        <td>Stock Actual</td>
        <td>Stock Crtico</td>
        <td>Diferencia entre Stock Critico y Actual</td>
        
        
    </tr>
    <?php 
    if($res){
    foreach ($res as $fila){
        
         $idmat=$fila->id_matprima;
         
    $MatP= new MateriaPrima($idmat);
    $res2 = $MatP->getByCodigoMat();
    
    if($res2){
       
    foreach ($res2 as $fila2){
    ?>    
    <tr>
        <td><?=$fila2->id_matPrima?></td>
        <td><?=$fila2->desc_matPrima?></td>
        <td><?=$fila2->actual_matPrima?></td>
        <td><?=$fila2->critico_matPrima?></td>
        <td><?=$fila2->dif_matPrima?></td>
  
    </tr>
    <?php
      }
      }
    }
    ?>
</table>

<a href="index.php"><img src="images/boton-inicio.png" 
   
    width="150px" height="70px"></a></a>
        <a href="proveedor.php?codigo=<?=$fila2->id_matPrima?>&bandera=0"><img src="images/atras.gif" 
    width="150px" height="70px"></a>
         
    <?php
    
    }else{
        echo '<h3>Error en los parametros</h3>';
        ?>
         <a href="FormCompras.php?bandera=0"><img src="images/atras.gif" 
    
    width="150px" height="70px"></a>></a>
         
         <?php
    }
        }
        

//else
//{
  //header("location: index.php");
   
//}?>
        </div>
    </body>
</html>