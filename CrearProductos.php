<?php
include './clases/Database.php';
include './clases/materiaPrima.php';
include './clases/Productos.php';
include './clases/detalleProducto.php';
$pro = new Productos($_GET['codigo']);
$rows = $pro->getByCodigo();

?>

<!doctype html>
<htm>
    <head>
        <title></title>
        <link href="estilos/styles.css" rel="stylesheet" media="screen">
        <meta charset="utf-8">
    </head>
    <body>
       
        <h1 style="margin: 0 auto; text-align: center;">
            Formulario para Crear Un Nuevo Producto
        </h1> 
        <div id="container" >
        <div class="col1">Camisa
            <a href="CrearProductos.php?bandera=1&codigo=pro1">
            <img src="images/camisa-rayas-cuello-mao-231x300.jpg" 
                 style="margin: 10px;" width="100px" height="100px" ></a>
                    </div>
        <div class="col1">Pantalon
            <a href="CrearProductos.php?bandera=2&codigo=Pro2">
                <img src="images/01089_pantalon_hombre_de_vestir_gris_segunda_mano_ropa_barata_talla_xl.jpg" 
                 style="margin: 10px;"  width="100px" height="100px" ></a>
                    
                    </div><div class="col1">Chaqueta
                    <a href="CrearProductos.php?bandera=3&codigo=Pro3">
                        <img src="images/chaqueta soft shell hombre.jpg" 
                 style="margin: 10px;"  width="100px" height="100px" ></a>
                    </div>
        </div>
    <?php
    if($_GET['bandera']==0){
        ?>
        <div id="container">
        <?php
    echo '<h1>Seleccione una prenda</h1>';
        ?>
        </div>
        <?php
    }  
        if($_GET['bandera']==1){
            echo 'hola'.$_GET['bandera'];
        ?>
       <div id="container">
            <form method="post" action="procesarCrea.php">
                <div class="filas">
                    <div class="col1">Imagen de Producto
                    <img src="images/camisa-rayas-cuello-mao-231x300.jpg"
                width="100px" height="100px" >
                    </div>
                    <div class="col2">
                        <table border= "1" >
                        <tr>
                            <td>Materia Prima</td>
                            <td>Cantidad Usada</td>
                            <td>Cantidad Disponible</td>
                            
                        </tr>
           <?php
          if($rows){
              foreach ($rows as $row){
                  
              $detpro = new DetalleProductos($row->id_producto);
              $respro = $detpro->getByCodigo();
              foreach ($respro as $fila){
             $getStock = new MateriaPrima($fila->id_matPrima);
             $resmat = $getStock->getByCodigoMat();
             foreach ($resmat as $ros);{
               ?>
            
            
                        <tr>
                        <td> <?=$fila->desc_matPrima?></td>
                        <td> <?=$fila->cantUsada?></td>
                        <td> <?=$ros->actual_matPrima?></td>
                        </tr>
                        <input type="hidden" name="idPro<?=$fila->id_matPrima?>" value="<?=$fila->id_producto?>" >
                         
                        <input type="hidden" name="idmat<?=$fila->id_matPrima?>" value="<?=$fila->id_matPrima?>" >
                        <input type="hidden"  name="cantusada<?=$fila->id_matPrima?>" value="<?=$fila->cantUsada?>" >
                        <input type="hidden"  name="cantdis<?=$fila->id_matPrima?>" value="<?=$ros->actual_matPrima?>" >
                        <input type="hidden" name="cri<?=$fila->id_matPrima?>" value="<?=$ros->critico_matPrima?>" >
                        <input type="hidden" name="dif<?=$fila->id_matPrima?>" value="<?=$ros->dif_matPrima?>" >
                        <?php
                        }
              }
                        ?>
                        </table>
                        <br>
                        <label>Ingrese fecha de creacion</label>
                        <input type="date" name="fecha">
                    </div>
                  
                </div>
                <?php
           }
         
                ?>
                
                
                <div class="filas" >
                    <div class="col1"  style="margin-left: 50px">
                        <input type="submit" value="Procesar">
                    </div>
                    <div class="col2" >
                        <input type="reset" value="Limpiar">
                    </div>
                </div>
            </form>
             </div> 
        <?php
    }  
        }
    
        
    if($_GET['bandera']==2){
        
    ?>
       <div id="container">
            <form method="post" action="procesarCrea.php">
                <div class="filas">
                    <div class="col1">Imagen de Producto
                        <img src="images/01089_pantalon_hombre_de_vestir_gris_segunda_mano_ropa_barata_talla_xl.jpg"
                width="100px" height="100px" >
                    </div>
                    <div class="col2">
                        <table border= "1" >
                        <tr>
                            <td>Materia Prima</td>
                            <td>Cantidad Usada</td>
                            <td>Cantidad Disponible</td>
                            
                        </tr>
           <?php
          if($rows){
              foreach ($rows as $row){
                  
              $detpro = new DetalleProductos($row->id_producto);
              $respro = $detpro->getByCodigo();
              foreach ($respro as $fila){
             $getStock = new MateriaPrima($fila->id_matPrima);
             $resmat = $getStock->getByCodigoMat();
             foreach ($resmat as $ros);{
               ?>
            
            
                        <tr>
                        <td> <?=$fila->desc_matPrima?></td>
                        <td> <?=$fila->cantUsada?></td>
                        <td> <?=$ros->actual_matPrima?></td>
                        </tr>
                        <input type="hidden" name="idPro<?=$fila->id_matPrima?>" value="<?=$fila->id_producto?>" >
                         
                        <input type="hidden" name="idmat<?=$fila->id_matPrima?>" value="<?=$fila->id_matPrima?>" >
                        <input type="hidden"  name="cantusada<?=$fila->id_matPrima?>" value="<?=$fila->cantUsada?>" >
                        <input type="hidden"  name="cantdis<?=$fila->id_matPrima?>" value="<?=$ros->actual_matPrima?>" >
                        <input type="hidden" name="cri<?=$fila->id_matPrima?>" value="<?=$ros->critico_matPrima?>" >
                        <input type="hidden" name="dif<?=$fila->id_matPrima?>" value="<?=$ros->dif_matPrima?>" >
                        <?php
                        }
              }
                        ?>
                        </table>
                        <br>
                        <label>Ingrese fecha de creacion</label>
                        <input type="date" name="fecha">
                    </div>
                  
                </div>
                <?php
           }
         
                ?>
                
                
                <div class="filas" >
                    <div class="col1"  style="margin-left: 50px">
                        <input type="submit" value="Procesar">
                    </div>
                    <div class="col2" >
                        <input type="reset" value="Limpiar">
                    </div>
                </div>
            </form>
             </div> 
        <?php
    }  
    }
    
        
    if($_GET['bandera']==3){
    ?>
        <div id="container">
            <form method="post" action="procesarCrea.php">
                <div class="filas">
                    <div class="col1">Imagen de Producto
                        <img src="images/chaqueta soft shell hombre.jpg"
                width="100px" height="100px" >
                    </div>
                    <div class="col2">
                        <table border= "1" >
                        <tr>
                            <td>Materia Prima</td>
                            <td>Cantidad Usada</td>
                            <td>Cantidad Disponible</td>
                            
                        </tr>
           <?php
          if($rows){
              foreach ($rows as $row){
                  
              $detpro = new DetalleProductos($row->id_producto);
              $respro = $detpro->getByCodigo();
              foreach ($respro as $fila){
             $getStock = new MateriaPrima($fila->id_matPrima);
             $resmat = $getStock->getByCodigoMat();
             foreach ($resmat as $ros);{
               ?>
            
            
                        <tr>
                        <td> <?=$fila->desc_matPrima?></td>
                        <td> <?=$fila->cantUsada?></td>
                        <td> <?=$ros->actual_matPrima?></td>
                        </tr>
                        <input type="hidden" name="idPro<?=$fila->id_matPrima?>" value="<?=$fila->id_producto?>" >
                         
                        <input type="hidden" name="idmat<?=$fila->id_matPrima?>" value="<?=$fila->id_matPrima?>" >
                        <input type="hidden"  name="cantusada<?=$fila->id_matPrima?>" value="<?=$fila->cantUsada?>" >
                        <input type="hidden"  name="cantdis<?=$fila->id_matPrima?>" value="<?=$ros->actual_matPrima?>" >
                        <input type="hidden" name="cri<?=$fila->id_matPrima?>" value="<?=$ros->critico_matPrima?>" >
                        <input type="hidden" name="dif<?=$fila->id_matPrima?>" value="<?=$ros->dif_matPrima?>" >
                        <?php
                        }
              }
                        ?>
                        </table>
                        <br>
                        <label>Ingrese fecha de creacion</label>
                        <input type="date" name="fecha">
                    </div>
                  
                </div>
                <?php
           }
         
                ?>
                
                
                <div class="filas" >
                    <div class="col1"  style="margin-left: 50px">
                        <input type="submit" value="Procesar">
                    </div>
                    <div class="col2" >
                        <input type="reset" value="Limpiar">
                    </div>
                </div>
            </form>
             </div> 
        <?php
    }  
    }
   
    
    
             ?></div>
        
             <div style="margin: 0 auto; text-align: center; margin: 20px" id="bac">
             <a href="FormCompras.php?bandera=0"></a>
            <a href="index.php"><img src="images/boton-inicio.png" 
    width="150px" height="70px"></a>
             
             <a href="FormCompras.php?bandera=0">
                    <img src="images/Banner_VerListadoCompletoMat.jpg" >
                </a>
             <a href="NuevoProducto.php">
                 <img src="images/Nuevo-producto-270x243.jpg"  width="100px"height="100px">
                </a>
        </div>          
             
        
        
    
    </body>
</html>