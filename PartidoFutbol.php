<?php 

class PartidoFutbol extends Partido {

    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2)
    {
        parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
    }
    
    //toString
    public function __toString()
    {
        $cadenaPadre = parent::__toString();
        return $cadenaPadre . "\n" ; 
    }

    public function gestionaCoeficiente()
    { 
        //obtengo el nombre de la categoria a traves del equipo que tiene una variable con 
        //referencia al objCategoria 
        $objEquipo = $this->getObjEquipo1() ;  
        $objCategoria = $objEquipo->getObjCategoria(); 
        $nombreCategoria = $objCategoria->getDescripcion();
        if ($nombreCategoria == "Menores") {
            $coeficienteFinal = 0.13 ; 
        } elseif($nombreCategoria == "juveniles"){
            $coeficienteFinal = 0.19 ; 
        } elseif ($nombreCategoria=="Mayores"){
            $coeficienteFinal = 0.27 ; 
        } else {
            $coeficienteFinal = -1; 
        }
        $this->setCoefBase($coeficienteFinal);
        return $coeficienteFinal;
    }
    
}