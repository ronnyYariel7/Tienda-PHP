<?php
include_once(dirname(__FILE__) . "/cabecera.php");
//controlador
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
}
