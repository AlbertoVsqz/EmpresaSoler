<!doctype html>
<htm>
    <head>
        <title></title>
        <link href="estilos/styles.css" rel="stylesheet" media="screen">
        <meta charset="utf-8">
    </head>
    <body>
        <h1 style="margin: 0 auto; text-align: center;">
            Formulario para Agregar Nueva Materia Prima
        </h1>
        <div id="container">
            <form method="post" action="procesar.php">
                <div class="filas">
                    <div class="col1">Codigo De Materia Prima</div>
                    <div class="col2">
                        <input type="text" name="codigomat">
                    </div>
                </div>
                <div class="filas">
                    <div class="col1">Ingrese Descripcion o Nombre</div>
                    <div class="col2">
                        <textarea name="descripcionmat"></textarea>
                    </div>
                </div>
                
                
                
                <div class="filas">
                    <div class="col1">Ingrese la Cantidad de Stock Critico</div>
                    <div class="col2">
                        <input type="text" name="cantcritico">
                    </div>
                </div>
                <div class="filas">
                    <div class="col1">Codigo del Proveedor</div>
                    <div class="col2">
                        <input type="text" name="codprovee">
                    </div>
                </div>
                
                <div class="filas">
                    <div class="col1">Nombre del Proveedor</div>
                    <div class="col2">
                        <input type="text" name="nombreprovee">
                        
                    </div>
                </div>
                
                <div class="filas">
                    <div class="col1">Ingrese el Telefono del Poveedor</div>
                    <div class="col2">
                        <input type="text" name="telpro">
                    </div>
                </div>
                  <div class="filas">
                    <div class="col1">Ingrese  la Direccion del Proveedor</div>
                    <div class="col2">
                        <textarea name="dirpro"></textarea>
                    </div>
                </div>
                 <div class="filas">
                    <div class="col1">Ingrese  Email del Proveedor</div>
                    <div class="col2">
                        <input type="text" name="emailpro">
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
                    <img src="images/Banner_VerListadoCompletoMat.jpg">
                </a>
            <a href="CompraMatPrima.php">
                <img src="images/comprar-ahora3.png" 
                     width="300px" height="140px">
                </a>
                        <a href="FormCompras.php?bandera=0"></a>
        <a href="index.php"><img src="images/boton-inicio.png" 
         width="150px" height="70px"></a>
                </div>
        
      
    
            
        
    
    </body>
</html>