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
include './clases/Proveedores.php';
include './clases/materia_X_proveedor.php';



if($_POST['codigomat']=="" || $_POST['descripcionmat']==""  || 
    $_POST['cantcritico']=="" || $_POST['codprovee']=="" || $_POST['nombreprovee']=="" 
    || $_POST['telpro']==""|| $_POST['dirpro']=="" || $_POST['emailpro']=="" ){
    
    echo 'No se han ingresado todos los datos';
    ?>
<a href="NuevaMatPrima.php"><img src="images/atras.gif" 
    width="150px" height="70px"></a>
    
   
            <?php
    }
    
    else{
      
    $con1 = $_POST['codprovee'];
    $con2= $_POST['codigomat'];
    $conca = $con1."".$con2;
    
    echo $conca;
    
    
    $pro = new Proveedores( $_POST['codprovee'], $_POST['nombreprovee'],
            $_POST['telpro'], $_POST['dirpro'], $_POST['emailpro']);
    
    if($pro->getByCodigo()){
        echo 'no se agrega ya exixte un proveedor con ese codigo</br>';
    }
    else{
        echo 'se agrega';
    if($pro->addproveedores()){
        echo 'Se agrego a prveedores a la base de datos</br>';
    }else {
    echo 'Error al ingresar la persona proveedores</br>';}
    
    
    }
   
    $mat = new MateriaPrima(
            $_POST['codigomat'],$_POST['descripcionmat'],"",$_POST['cantcritico'], "");
     if($mat->getByCodigoMat()){
        echo 'no se agrega ya exixte una materia prima con ese codigo</br>';
    }
    else{
        echo 'se agrega';
    if($mat->addMatPrima()){
        echo 'Se agrego a materia prima a la base de datos</br>';
    }else {
     echo 'Error al ingresar la materia prima</br>';
    }
    
    }
    
    
    $matxpro = new MateriaPorProveedor($conca, $_POST['codigomat'],  $_POST['codprovee'] );
    
    if($matxpro->getByCodigoMatxProvee()){
        echo 'no se agrega ya exixte una materia primaXproveedor  con ese codigo</br>';
    }
    else{
        echo 'se agrega';if($matxpro->addMatPrima()){
        echo 'Se agrego a materia prima X proveedor a la base de datos</br>';
    }else {
     echo 'Error al ingresar la materia prima X proveedor</br>';
    }
    }
    
    ?>
            <div style="margin: 0 auto; text-align: center; margin: 20px" id="bac">
        <a href="NuevaMatPrima.php"><img src="images/atras.gif" 
    width="150px" height="70px"></a>        
        <a href="FormCompras.php?bandera=0">
                    <img src="images/Banner_VerListadoCompletoMat.jpg" 
                 >
                </a>
                      
<a href="index.php"><img src="images/boton-inicio.png" 
    width="150px" height="70px"></a>
                </div>
            <?php 
    }
    ?>
        
           
</div>

</body>
</html>