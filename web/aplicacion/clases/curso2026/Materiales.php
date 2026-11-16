<?php

//defino el tipo enum Estado 
enum Materiales :int
{ 
    case Madera =5; 
    case Hierro=10;
    case Marmol=15;
    case Plastico=20;

    function devolverValor():int{
        return $this->value;
    }

    function descripcion():string{
        return $this->name;
    }
    
    /**
     * Encontrar por Valor 
     * SI existe devuelve el material si no  devuelve false
     *
     * @param integer $value
     * @return Materiales|false
     */
   function devolverCaso(int $value): Materiales|false{
   
    $array=Materiales::cases();
    
    foreach($array as $material){ 
        if($material->devolverValor()==$value)
            return $material;
    }
    return false;
   }
 
} 



?>