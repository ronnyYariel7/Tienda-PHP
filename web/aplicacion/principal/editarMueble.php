<?php

use function PHPSTORM_META\type;

include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
require_once '../clases/curso2026/datosMuebles.php';
require_once '../clases/curso2026/MuebleBase.php';
require_once '../clases/curso2026/MuebleReciclado.php';
require_once "../clases/curso2026/Caracteristicas.php";
require_once "../clases/curso2026/MuebleTradicional.php";

$barra=[
    [
    "TEXTO"=> "Tienda  ",
    "ENLACE"=>"/aplicacion/principal/index.php"],
      [
        "TEXTO"=> "Pruebas",
        "ENLACE"=> "/aplicacion/principal/pruebas.php"
    ],
 
    
    
];

$almacen=new datosMuebles();
$arrayDatos=$almacen->datosMuebles();

/*$datosMuebles=[
    "nombre"=>$_GET["nombre"]??"",
    "Fabricante"=>$_GET["fabricante"]??"",
    "Pais"=>$_GET["pais"]??"",
    "anio"=>$_GET["anio"]??"",
    "fechaInVenta"=>$_GET["fechaInVenta"]??"",
    "fechaFinVenta"=>$_GET["fechaFinVenta"]??"",
    "precio"=>$_GET["precio"]??"",
    "pordentajeReciclado"=>$_GET["reciclado"],

];*/

$errores=[];

$selecionado=intval($_GET["opcionesMuebles"]);
$mueble=$arrayDatos[$selecionado];
if(isset($_POST["editarMueble"])){
    
    if(!($mueble->setNombre($_POST["nombre"])))
        {
           
            $errores["nombre"][]="Nombre (cadena de máximo 40,
                     no puede estar vacía, a mayúscula,obligatorio)";
        }
    if(!($mueble->setFabircante(($_POST["fabricante"]))))
        {
            $errores["fabricante"][]="Fabricante (cadena de máximo 30)";
        }
    if(!($mueble->setPais(($_POST["pais"]))))
        {
            $errores["pais"][]="Pais(cadena de máximo 20)";
        }
    if(!($mueble->setAnio(intval(($_POST["anio"])))))
        {
            $errores["año"][]="Año (valor entre 2020 y el año actual)";
        }
    if(!($mueble->setFechaIniVenta(($_POST["fechaInVenta"]))))
        {
            $errores["fechaInVenta"][]="Fecha Inicio (no puede ser anterior al uno de enero del Anio de inicio)";
        }
     if(!($mueble->setFechaFinVenta(($_POST["fechaFinVenta"]))))
        {
            $errores["fechaFinVenta"][]="Fecha Fin (no puede ser anterior a la Fecha Inicio de Venta)";
        }
    if(!($mueble->setPrecio(($_POST["precio"]))))
        {
            $errores["precio"][]="Precio (no puede ser menor de 30)";
        }
    
        if($mueble instanceof MuebleReciclado){
            if(!($mueble->setPorcentajeReciclado($_POST["reciclado"])))
                {
                    $errores["reciclado"][]="Pocentaje debe estar entre 0 y 100 ";
                }
        }

    if($mueble instanceof MuebleTradicional){
            if(!($mueble->setPeso($_POST["peso"])))
                {
                    $errores["peso"][]="El Peso debe Estar entre 15 y 300 Kg ";
                }
             $mueble->setSerie(($_POST["serie"]));
               
        }
   
   

}


$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION",$barra);
cuerpo($mueble,$errores);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{}

//vista
function cuerpo($mueble,$errores)
{
?>
  
<?php
    if(isset($_POST["editarMueble"]) && empty($errores)){
            mensajeExito();
            resumen($mueble);
    }
    else 
    { 
        formularioEditarMueble($mueble,$errores);
    }
   

}

function formularioEditarMueble(MuebleBase $mueble,array $errores){

            if($errores){
            echo '<div class="error">"';
             foreach($errores as $clave=>$valor){
                foreach($valor as $error)
                    {
                        echo "$clave=>$error<br>";
                    }
             } 
             echo "</div>";

            }
        ?>

<form action="" method="post" class="mi-formulario">
    <label for="">Nombre:</label>
    <input type="text" name="nombre" value="<?= $mueble->getNombre() ?>"><br>
    <?php if(isset($errores["nombre"])){
        foreach($errores["nombre"] as $error){
            echo '<div class="error">';
            echo $error;
            echo "</div>";
        }
    } ?>
    <label for="">Fabricante</label>
    <input type="text" name="fabricante" value="<?= $mueble->getFabricante() ?>"><br>
    <?php if(isset($errores["fabricante"])){
        foreach($errores["fabricante"] as $error){
            echo '<div class="error">';
            echo $error;
            echo "</div>";
        }
    } ?>
    <label for="">Pais:</label>
    <input type="text" name="pais" value="<?= $mueble->getPais() ?>"><br>
    <?php if(isset($errores["pais"])){
        foreach($errores["pais"] as $error){
            echo '<div class="error">';
            echo $error;
            echo "</div>";
        }
    } ?>
    <label for="">Año:</label>
    <input type="number" name="anio" value="<?= $mueble->getAnio() ?>"><br>
    <?php if(isset($errores["año"])){
        foreach($errores["año"] as $error){
            echo '<div class="error">';
            echo $error;
            echo "</div>";
        }
    } ?>
    <label for="">Fecha Inicio de Venta:</label>
    <input type="text" name="fechaInVenta" value="<?= $mueble->getFechaIniVenta() ?>"><br>
    <?php if(isset($errores["fechaInVenta"])){
        foreach($errores["fechaInVenta"] as $error){
            echo '<div class="error">';
            echo $error;
            echo "</div>";
        }
    } ?>
    <label for="">Fecha Fin Venta:</label>
    <input type="text" name="fechaFinVenta" value="<?= $mueble->getFechaFinVenta() ?>"><br>
    <?php if(isset($errores["fechaFinVenta"])){
        foreach($errores["fechaFinVenta"] as $error){
            echo '<div class="error">';
            echo $error;
            echo "</div>";
        }
    } ?>
    <label for="">Precio:</label>
    <input type="number" name="precio" value="<?= $mueble->getPrecio() ?>"><br>
    <?php if(isset($errores["precio"])){
        foreach($errores["precio"] as $error){
            echo '<div class="error">';
            echo $error;
            echo "</div>";
        }
    } 
        if($mueble instanceof MuebleReciclado)
            {?>
                <label for="">Porcentaje Reciclado:</label>
                <input type="number" name="reciclado" value="<?= $mueble->getPorcentaje()?>"><br>
                <?php if(isset($errores["reciclado"])){
                        foreach($errores["reciclado"] as $error){
                            echo '<div class="error">';
                            echo $error;
                            echo "</div>";
                        }
                }
            }
        if($mueble instanceof MuebleTradicional)
            {?>
                <label for="">Peso:</label>
                <input type="number" name="peso" value="<?= $mueble->getPeso()?>"><br>
                <?php if(isset($errores["peso"])){
                        foreach($errores["peso"] as $error){
                            echo '<div class="error">';
                            echo $error;
                            echo "</div>";
                        } ?>
                
                
                <?php
                }
                ?>
                <label for="">Serie:</label>
                <input type="text" name="serie" value="<?= $mueble->getSerie()?>"><br>
                <?php
            }
    ?>

    <button type="submit" name="editarMueble" value="bt3">Cambiar Datos</button>
</form>
            <?php
}

function mensajeExito(){
    ?>
    <div class="mensaje-exito">
        <p>Los Datos Se han Actualizado Correctamente</p>
    </div>
    <?php
}

function resumen(MuebleBase $mueble){
    ?>
    <div class="mi-formulario">
        <?php echo "{$mueble->__toString()}"; ?>
    </div>
    <?php
}