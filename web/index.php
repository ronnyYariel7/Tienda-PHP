<?php
include_once(dirname(__FILE__) . "/cabecera.php");
//controlador
$barra=[

      [
        "TEXTO"=> "Tienda",
        "ENLACE"=> "/aplicacion/principal/index.php"
    ]
 
    
    
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
    <br><br>
    
    Hola, estás en Index.php wecwecw
    <br>
    <a href="/aplicacion/plantilla/index.php">ir a otro index</a>
<?php
}
