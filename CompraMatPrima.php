<?php
    include './clases/Database.php';
    include './clases/materiaPrima.php';
    include './clases/Proveedores.php';
    
   $materiaPrima = new MateriaPrima();
   $res =$materiaPrima->getAll();
            ?>
<!doctype html>
<html>
    <head>
        <title></title>
        <link href="estilos/styles.css" rel="stylesheet" media="screen">
        <meta charset="utf-8">
        
       
    </head>
    <body>
        <h1 style="margin: 0 auto; text-align: center;">
            Formulario para Comprar Materia Prima
        </h1>
        
        <div id="container">
            <form method="post" action="procesarCompra.php" name="fomulario" >
                 <div class="filas">
                    <div class="col1">Ingrese el Codigo de Compra</div>
                    <div class="col2">
                        <input type="text" name="codcompra">
                    </div>
                </div>
                
                
                <div class="filas">
                    <div class="col1">Nombre De Materia Prima</div>
                    <div class="col2">
                        <select name="NomMatPrima">
                        <?php
                        foreach ($res as $rowa){
                        ?>
                            <option value="<?=$rowa->id_matPrima?>"  ><?=$rowa->desc_matPrima?></option>
                        <?php
                        }
                        ?>
                            
                        </select>
                        
                        
                    </div>
                </div>
                
                
                <?php
                        
                $mat = new Proveedores();
                $res2 =$mat->getAll();
                     
                ?>
                <div class="filas">
                    <div class="col1">Codigo de Proveedor </div>
                    <div class="col2">
                       <select name="codProveedor">
                         <?php
                        foreach ($res2 as $rowa){
                        ?>
                           <option ><?=$rowa->id_proveedor?></option>
                        <?php
                        }
                        ?>
                          
                            
                        </select>
                    </div>
                </div>
                
                <div class="filas">
                    <div class="col1">Ingrese la Cantidad a Comprar</div>
                    <div class="col2">
                        <input type="text" name="cantcompra">
                    </div>
                </div>
                
                
                <div class="filas">
                    <div class="col1">Precio Unitario de la Materia Prima</div>
                    <div class="col2">
                          <input type="text" name="preciomat">
                    </div>
                </div>
                  <div class="filas">
                    <div class="col1">Fecha de Compra de la Materia Prima</div>
                    <div class="col2">
                        <input type="date" name="fecha">
                    </div>
                </div>
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
        
        
        <div style="margin: 0 auto; text-align: center; margin: 20px" id="bac">
                <a href="FormCompras.php?bandera=0">
                    <img src="images/Banner_VerListadoCompletoMat.jpg"  >
                </a>
                         
        <a href="FormCompras.php?bandera=0"></a>
            <a href="index.php"><img src="images/boton-inicio.png" 
    swidth="150px" height="70px"></a> 
        
                </div>
                
             
    
    </body>
</html>