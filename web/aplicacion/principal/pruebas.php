<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
require_once '../clases/curso2026/MuebleBase.php';
require_once '../clases/curso2026/MuebleReciclado.php';
require_once "../clases/curso2026/Caracteristicas.php";
require_once "../clases/curso2026/MuebleTradicional.php";
require_once "../clases/curso2026/Materiales.php";
$barra=[
    [
        "TEXTO"=> "Tienda",
        "ENLACE"=> "/aplicacion/principal/index.php"
    ],
      [
        "TEXTO"=> "Pruebas",
        "ENLACE"=> "/aplicacion/principal/pruebas.php"
    ],
 
    
    
];


$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION",$barra);
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{}

//vista
function cuerpo()
{
?>
  
<?php
    ?>
    <h3>Clase Caracteristicas</h3>
    <?php
    $carac1 = new Caracteristicas();
    $carac1->agregarCaracteriticas([
    "color" => "Naranja",
    "material" => "Madera",
    "ULTIMA" => "Anti-humedad"]);
    echo "Resultado Caracteristicas: ".$carac1."<br>";
    ?>
    <h3>comprobar cuantas instancias de MuebleBase se Pueden crear</h3>
    <?php
    $disponibles=0;
    if (MuebleBase::puedeCrear($disponibles)) {
        echo "Se pueden crear muebles.disponibles: {$disponibles}\n\n";
    } else {
        echo "Límite de muebles alcanzado.\n\n";
    }
    ?>
    <h3>Mueble Reciclado</h3>
    <?php
    $caracReciclado = new Caracteristicas();
    $caracReciclado->agregarCaracteriticas(["Color" => "Amarillo"]);

    $muebleRec = new MuebleReciclado("Mesa de Centro", "Ikea", "España", 2022, 
    "01/01/2022", "31/12/2035", 120.50,$caracReciclado,Materiales::Madera, 80 );
    echo $muebleRec . "\n\n";
    ?>
    <h3>Mueble Tradiconal</h3>
    <?php
    $caracTradicional = new Caracteristicas();
    $caracTradicional->agregarCaracteriticas(["estilo" => "Clasico", "acabado" => "Barnizado"]);

    $muebleTrad = new MuebleTradicional("Sillon Clasico", "MueblesAntiguos", "Italia", 2021, "15/05/2021", 
                            "31/12/2038", 250.00,  $caracTradicional,Materiales::Hierro, 45.0,"SERIE-A99");
    // añadir Carcateristica
    $muebleTrad->anadirCaracteristica("Ancho",125,"Alto",70);
    echo $muebleTrad . "\n\n";

 

}
