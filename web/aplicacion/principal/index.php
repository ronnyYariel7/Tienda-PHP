<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

require_once "../clases/curso2026/datosMuebles.php";
$barra=[
    [
        "TEXTO"=> "Tienda",
        "ENLACE"=> "/aplicacion/principal/index.php"
    ],
      [
        "TEXTO"=> "Prueba",
        "ENLACE"=> "/aplicacion/principal/pruebas.php"
    ]
 
    
    
];

$almacen=new datosMuebles();
$arrayDatos=$almacen->datosMuebles();

$botonSelecionado=null;
$mueble=null;
if(isset($_POST["mostrarMueble"])){

    $botonSelecionado=$_POST["mostrarMueble"];
    $selecionado= intval($_POST["opcionesMuebles"]);
    $mueble=$arrayDatos[$selecionado];
}
if(isset($_POST["modificarMueble"]))
    {
        $botonSelecionado=$_POST["modificarMueble"];
       
    }



$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION",$barra);
cuerpo($arrayDatos,$mueble,$botonSelecionado);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{}

//vista
function cuerpo($datos,$mueble,$botonSelecionado)
{
?>
    <h2>Muebles Disponibles en Nuestro Almacen</h2>
<?php
?>
    <table class="tablaMuebles">
        <td>id</td>
        <td>Nombre</td>
        <td>Fabricante</td>
        <td>Pais</td>
        <td>Precio</td>
   <?php foreach($datos as $index=>$valor){
             agregarFilaTabla($valor,$index);
        }
    ?></table>
        <hr>
    <?php
    formulario($datos);

    if($botonSelecionado==="bt1"){mostrarMueble($mueble);}

   
}

function agregarFilaTabla(MuebleBase $mueble,int $id){
?>

<tr>
    <td><?= $id?></td>
    <td><?=$mueble->getNombre()?></td>
    <td><?=$mueble->getFabricante()?></td>
    <td><?=$mueble->getPais()?></td>
    <td><?=$mueble->getPrecio()?>€</td>
</tr>
<?php
}

function formulario($datos){
    ?>
    <form action="" method="post"  class="mi-formulario">
        <select name="opcionesMuebles" id="opcionesMuebles">
             <?php foreach($datos as $index=>$valor) {
                 agregaOpcionSelect($valor,$index);
                    
                }?>        
        </select>
        <button type="submit" name="mostrarMueble" value="bt1">Mostrar Muebles</button>
        <button type="submit" name="modificarMueble" value="bt2" formaction="editarMueble.php" formmethod="get">
            Modificar Muebles</button>
    </form>
<?php

}

function agregaOpcionSelect(MuebleBase $muebles,int $id){
    ?>
    <option value="<?=$id?>"><?= $muebles->getNombre()?></option>
    <?php
}

function mostrarMueble(MuebleBase $mueble){
    ?>
    <div class="mi-formulario">
        <p><?= $mueble->__toString() ?></p>
    </div>
    <?php
}



