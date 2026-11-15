<?php
#[\AllowDynamicProperties] //para evitar warning de deprecated
class Caracteristicas {

private bool $_bloquear=false;// Bloquear Caracteristicas

    public function agregarCaracteriticas(array $caracteristicas){
        foreach($caracteristicas as $nombrePropiedades =>$valor){

               if($nombrePropiedades=="ULTIMA" && property_exists($this,$nombrePropiedades)){

                $this->_bloquear=true;

                $this->$nombrePropiedades=$valor;

               }

               try {

                if(!$this->_bloquear)$this->$nombrePropiedades=$valor;
                else throw new Error("No se pueden agregar más Carcateristicas");
               }

               catch(Exception $e){

                    echo "Error".$e->getMessage();

               }      
        }
    }
    
    //Devolver todas las Carcateristicas 
    public function devolverCarcateristicas():array {
        $todasCaracteristicas=[];

        foreach($this as $clave=>$valor){
            $todasCaracteristicas[$clave]=$valor;
        }

        return array_reverse($todasCaracteristicas);
    }


    /**
     * Método toString
     *
     * @return string
     */
    public function __toString()
    {
        $cadena="";
        $cont=1;
       foreach($this as $propiedad=>$valor){
        if($propiedad!="_bloquear"){
        $cadena.="|Car".$cont.": ".$valor;
        $cont++;}                     
       }

       return $cadena;
    }

    /**
     * Método que nos permite cambiar el Estado de $_bloquear
     *
     * @param boolean $estasdo
     * @return void
     */
    public function setbloquear(bool $estasdo){$this->_bloquear=$estasdo;}

}





?>