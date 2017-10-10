<?php
include './clases/Database.php';
include './clases/materiaPrima.php';
$mat = new MateriaPrima();
$rows = $mat->getAll();

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
            Formulario para Crear Nuevos Productos para Su Posterior Creacion
        </h1>
        <div id="container">
            <form method="post" action="procesarProducto.php">
                <div class="filas">
                    <div class="col1">Codigo Del Productos</div>
                    <div class="col2">
                        <input type="text" name="codigopro">
                    </div>
                </div>
                <div class="filas">
                    <div class="col1">Ingrese Descripcion o Nombre</div>
                    <div class="col2">
                        <textarea name="descripcionpro"></textarea>
                    </div>
                </div>
                
                <div class="filas">
                    <div class="col1">Seleccione La Materia Prima </div>
                    <div class="col2">
                        <?php
                        foreach ($rows as $row){
                           ?>      
                        <input type="radio" name="nommat<?=$row->id_matPrima?>" value="<?=$row->id_matPrima?>"><?=$row->desc_matPrima?>
                        
                        <input id="c" type="text" name="cantmat<?=$row->id_matPrima?>" placeholder="Introduzca cantidad ">
                        <?php
                        }
                        ?>
                    </div>
                    <div class="col3">
                    
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
            <a href="FormProduccion.php?bandera=0">
                <img src="images/Banner_VerListadoCompletoPro.jpg"  >
                </a>
            <a href="CrearProductos.php?bandera=0&codigo=">
                <img src="images/Banner_VerListadoCompletoMatCrea.jpg"  >
                </a>
                        <a href="FormCompras.php?bandera=0"></a>
          <a href="index.php"><img src="images/boton-inicio.png" 
    width="150px" height="70px"></a>
                </div>
      
        
    
    </body>
</html>