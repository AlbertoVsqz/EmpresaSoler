<?php
include './clases/Database.php';
include './clases/materiaPrima.php';
include './clases/Productos.php';
include './clases/detalleProducto.php';
?>
<!doctype html>
<html>
    <head>
        <title></title>
        <link href="estilos/styles.css" rel="stylesheet" media="screen">
        <meta charset="utf-8">
    </head>
    <body>
        
        <h1>LISTADO DE PRODUCTOS CON SU MATERIA PRIMA RESPECTIVA</h1>
        
        <div id="form">
    
    <?php
if($_GET['bandera']==0){
$pro = new Productos();
$rows = $pro->getAll();



?>
<table border= "1" >
    <tr>
        <td>Codigo del Producto</td>
        <td>Nombre del Producto</td>
        <td>Codigo de la Materia Prima</td>
        <td>Nombre de la Materia Prima</td>
        <td>Cantidad de Materia prima Usada</td>
        
    </tr>
     <?php 
    
   foreach ($rows  as $row ){
   
        ?>
        <tr style="background: red">
        <td><?=$row->id_producto?></td>
        <td><?=$row->nom_producto?></td>
        <td></td>
            <td></td>
            <td></td>
            
        </tr>
    <?php
       
        $det= new DetalleProductos($row->id_producto);
        $rosa = $det->getByCodigo();
    foreach ($rosa  as $rowa ){ 
    ?>
        <tr>
            <td></td>
            <td></td>
        <td><?=$rowa->id_matPrima?></td>
        <td><?=$rowa->desc_matPrima?></td>
        <td><?=$rowa->cantUsada?></td> 
        
         </tr> 
  
    <?php
   } 
   
    }
     ?>    
     </table>
            <?php
    }
     ?>
  <br>
  <div style="margin: 0 auto; text-align: center; margin: 20px" id="bac">

     <a href="index.php"><img src="images/boton-inicio.png" 
   width="150px" height="70px"></a>
     
     <a href="CrearProductos.php?bandera=0&codigo=">
                <img src="images/Banner_VerListadoCompletoMatCrea.jpg"  >
                </a>
                        
                </div>

  
</div>

</body>
</html>
