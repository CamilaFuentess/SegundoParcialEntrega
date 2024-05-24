<?php 

class PartidoBasquet extends Partido {

    //atributos 
    private $cantInfracciones ;
    private $coeficientePenalizacion; 

    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2,$nroInfraciones)
    {
        parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
        $this->cantInfracciones = $nroInfraciones;
        $this->coeficientePenalizacion = 0.75; 
    }

    //get
    public function getCantInfracciones(){
		return $this->cantInfracciones;
	}
    public function getCoeficientePenalizacion(){
        return $this->coeficientePenalizacion;
    }

    //set
	public function setCantInfracciones($nroInfracciones){
		$this->cantInfracciones = $nroInfracciones;
	}
    public function setCoeficientePenalizacion($coeficientePenalizacion){
        $this->coeficientePenalizacion = $coeficientePenalizacion;
    }

    //to string
    public function __toString()
    {
        $cadenaPadre = parent::__toString() ; 
        return $cadenaPadre . 
        "Cantidad de infracciones: " . $this->getCantInfracciones() . "\n" ;
    }

    //hereda de padre un coeficiente base 
    public function coeficientePartido(){
        $coeficienteBase = parent::coeficientePartido() ; 
        $coeficientePenalizacion = 0.75;
        //$coeficientePenalizacion = $this->getCoeficientePenalizacion();
        $coeficiente = $coeficienteBase  - ($coeficientePenalizacion * $this->getCantInfracciones()) ;
        $this->setCoefBase($coeficiente);
        return $coeficiente; 
    }
}