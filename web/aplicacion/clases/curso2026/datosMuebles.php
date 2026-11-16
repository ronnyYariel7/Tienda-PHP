<?php
require_once "Caracteristicas.php";
require_once "MuebleBase.php";
require_once "MuebleReciclado.php";
require_once "MuebleTradicional.php";
require_once "Materiales.php";

class datosMuebles {


    private array $_muebles;
    public function __construct()
    {
        $this->_muebles=[];
    }


    public function datosMuebles(){
        $carac1 = new Caracteristicas();
        $carac1->agregarCaracteriticas([
            "color" => "Blanco",
            "material" => "Pino reciclado",
            "acabado" => "Mate"
        ]);

        $carac2 = new Caracteristicas();
        $carac2->agregarCaracteriticas([
            "color" => "Marrón",
            "material" => "Roble macizo",
            "estilo" => "Clásico"
        ]);

        $carac3 = new Caracteristicas();
        $carac3->agregarCaracteriticas([
            "color" => "Gris",
            "material" => "Plástico reciclado",
            "uso" => "Exterior"
        ]);

        $carac4 = new Caracteristicas();
        $carac4->agregarCaracteriticas([
            "color" => "Negro",
            "material" => "Nogal",
            "puertas" => "2 puertas"
        ]);

        $carac5 = new Caracteristicas();
        $carac5->agregarCaracteriticas([
            "color" => "Natural",
            "material" => "Palets recuperados",
            "ruedas" => "Con freno"
        ]);


        // Array Indexado

        $this->_muebles = [
            1 => new MuebleReciclado("Silla ", "MaderasSur", "España", 2021, "10/02/2021", "31/12/2030", 
                45.00, $carac1,Materiales::Madera, 85 
            ),
            2 => new MuebleTradicional("Mesa Comedor", "CarpinteriaNorte", "España", 2020, "15/03/2020", "31/12/2035", 
                                        180.00,  $carac2,Materiales::Hierro, 35.5, "S01" 
            ),
            3 => new MuebleReciclado("Banco Jardin", "Eco", "Portugal", 
                2022, "01/05/2022","31/12/2032", 95.50, $carac3,Materiales::Plastico, 100 
            ),
            4 => new MuebleTradicional("Armario Ropero", "MueblesCentro", "Italia", 2023, "20/01/2023", 
                "31/12/2040", 320.00, $carac4,Materiales::Marmol, 85.0, "S04" // Serie
            ),
            5 => new MuebleReciclado("Mesa Centro", "ReWood", "España", 2024, "12/04/2024", "31/12/2038", 
                75.00, $carac5,Materiales::Hierro, 70 
            )
        ];

        return $this->_muebles;
    }

}  
?>