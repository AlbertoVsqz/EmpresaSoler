<?php
include './clases/Database.php';
include './clases/materiaPrima.php';


?>
<!doctype html>
<html>
    <head>
        <title></title>
        <link href="estilos/styles.css" rel="stylesheet" media="screen">
        <meta charset="utf-8">
    </head>
    <body>
        <h1>LISTADO DE  MATERIA PRIMA </h1>
        <div id="form">
    

    <?php
if($_GET['bandera']==0){
$mat = new MateriaPrima();
$rows = $mat->getAll();


?>
<table border= "1">
    <tr>
        <td>Codigo</td>
        <td>Descripcion</td>
        <td>Stock Actual</td>
        <td>Stock Crtico</td>
        <td>Diferencia entre Stock Critico y Actual</td>
        
        <td>Action</td>
        
    </tr>
    
    <?php
  
    foreach ($rows  as $row ){
    if($row->actual_matPrima < $row->critico_matPrima){
        ?>
    
   
        
    <tr style="background: red">
        <td><?=$row->id_matPrima?></td>
        <td><?=$row->desc_matPrima?></td>
        
        
        <td><?=$row->actual_matPrima?></td>
        <td><?=$row->critico_matPrima?></td>
        <td><?=$row->dif_matPrima?></td>
       
        <td><a href="proveedor.php?codigo=<?=$row->id_matPrima?>&bandera=0">Ver Proveedor</a></td>
        </tr>
         
   
<?php
    
    
}else{
        ?>
        
 
         
        <tr style="background: greenyellow">   
            
        <td><?=$row->id_matPrima?></td>
        <td><?=$row->desc_matPrima?></td>
        
       
       
        <td><?=$row->actual_matPrima?></td>
        <td><?=$row->critico_matPrima?></td>
        <td><?=$row->dif_matPrima?></td>
        
        <td><a href="proveedor.php?codigo=<?=$row->id_matPrima?>&bandera=0">Ver Proveedor</a></td>
    </tr>
  
<?php

     
    
    
   }
    }
    
?>  
     </table>
  <br>
  <div id="bac">
  <h1>
      
      <a href="FormCompras.php?bandera=1">Ver Solo Listado de Materia prima en Estado Critico</a></h1>
  <a href="index.php"><img src="images/boton-inicio.png" 
    width="150px" height="70px"></a>
  </div>
  <?php

   
}
    

?>

    
<?php
 

    ?>  
<?php
if($_GET['bandera']==1)   {
    $mat = new MateriaPrima();
$rows = $mat->getMatCritico();


?>
  <table border= "1" id="bac">
    <tr>
        <td>Codigo</td>
        <td>Descripcion</td>
        <td>Stock Actual</td>
        <td>Stock Crtico</td>
        <td>Diferencia entre Stock Critico y Actual</td>
        
        <td>Action</td>
        
    </tr>
    <?php 
    foreach ($rows as $row){
       
    ?>
   
    <tr style="background: red">
        <td><?=$row->id_matPrima?></td>
        <td><?=$row->desc_matPrima?></td>
        
     
        <td><?=$row->actual_matPrima?></td>
        <td><?=$row->critico_matPrima?></td>
        <td><?=$row->dif_matPrima?></td>
       
        <td><a href="proveedor.php?codigo=<?=$row->id_matPrima?>&bandera=0">Ver Proveedor</a></td>
        </tr>
         
    
    

<?php
   
    }
    ?></table>
  <br>
  <div id="bac">
<h1> <a href="FormCompras.php?bandera=0">Ver Listado Completo de Materia prima</a></h1>
<a href="index.php"><img src="images/boton-inicio.png" 
    width="150px" height="70px"></a>
<a href="CompraMatPrima.php">
                <img src="images/comprar-ahora3.png" 
                     width="300px" height="140px">
                </a>
  </div>

<?php
    
}
    
    ?>
</div>

</body>
</html>