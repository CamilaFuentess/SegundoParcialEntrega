<?php

class Torneo {

    //Atributos
    private $colPartidos ; 
    private $importePremio ;  


    //Constructor
    public function __construct($coleccionPartidos, $importe)
    {
        $this->colPartidos = $coleccionPartidos ; 
        $this->importePremio = $importe ;   
    }

    //Get
    public function getColPartidos(){
		return $this->colPartidos;
	}
	public function getImportePremio(){
		return $this->importePremio;
	}

    //Set
	public function setImportePremio($importePremio){
		$this->importePremio = $importePremio;
	}
    public function setColPartidos($colPartidos){
		$this->colPartidos = $colPartidos;
	}

    //ToString
    public function __toString()
    {
        return "Lista de los partidos: \n" .$this->mostrarColPartidos() . "\n" . 
        "Importe del premio: " . $this->getImportePremio() . "\n" ;
    }

    //muestra la coleccion de los partidos 
    public function mostrarColPartidos(){
        $coleccionPartidos = $this->getColPartidos() ; 
        $lista = "" ; 
        foreach($coleccionPartidos as $partido){
            $lista = $lista . $partido . "\n";
        }
        return $lista;
    }

    /**recibe por parámetro 2 equipos, la fecha en la que se realizará el partido y
     * si se trata de un partido de futbol o basquetbol . El método debe crear y retornar
     *  la instancia de la clase Partido que corresponda y almacenarla en la colección
     * de partidos del Torneo. Se debe chequear que los 2 equipos tengan la misma
     * categoría e igual cantidad de jugadores, caso contrario no podrá ser registrado
     * ese partido en el torneo. */
    public function ingresarPartido($objEquipo1,$objEquipo2,$fecha,$tipoPartido){
        $nuevoPartido = null; 
        $coleccionPartidos = $this->getColPartidos() ;

        //obtengo el obj de categoria de cada equipo
        $categoriaE1 = $objEquipo1->getObjCategoria();
        $categoriaE2 = $objEquipo2->getObjCategoria(); 
        //tengo la descripcion de la c ategoria de cada equipo
        $desCategoriaE1 = $categoriaE1->getDescripcion();
        $desCategoriaE2 = $categoriaE2->getDescripcion();

        //obtengo la cant de jugadores de cada equipo
        $cantJugadoresE1 = $objEquipo1->getCantJugadores(); 
        $cantJugadoresE2 = $objEquipo2->getCantJugadores();

        //obtengo el nombre para que no juegen contra si mismos
        $nombreE1 = $objEquipo1->getNombre();
        $nombreE2 = $objEquipo2->getNombre();
        
        if ($desCategoriaE1==$desCategoriaE2 && $cantJugadoresE1==$cantJugadoresE2 && ($nombreE1!=$nombreE2)){
            $idPartido = count($this->getColPartidos()) + 1 ;

            if ($tipoPartido=="Futbol"){
                $nuevoPartido = new PartidoFutbol($idPartido,$fecha,$objEquipo1,0,$objEquipo2,0);
            } else {
                $nuevoPartido = new PartidoBasquet($idPartido,$fecha,$objEquipo1,0,$objEquipo2,0,0);
            }
             
            $coleccionPartidos[] = $nuevoPartido;
            $this->setColPartidos($coleccionPartidos);
        }
        return $nuevoPartido ; 
    }

    /**recibe por parámetro si se trata de un partido de fútbol o de básquetbol y en
     * base al parámetro busca entre esos partidos los equipos ganadores ( equipo con
     * mayor cantidad de goles). El método retorna una colección con los objetos de los
     * equipos encontrados */
    public function darGanadores($deporte){
        $colPartidos = $this->getColPartidos();
        $colEquiposGanadores = []; 
        foreach($colPartidos as $unPartido){
            if ($deporte == "Futbol" && $unPartido instanceof PartidoFutbol) {
                $colEquiposGanadores[]=$unPartido->darEquipoGanador();
            }
            if ($deporte == "Basquet" && $unPartido instanceof PartidoBasquet){
                $colEquiposGanadores[] = $unPartido->darEquipoGanador();
            }
        }
        return $colEquiposGanadores;
    }

    /** retornar un arreglo asociativo donde una de sus claves es ‘equipoGanador’ y
     *  contiene la referencia al equipo ganador; y la otra clave es ‘premioPartido’
     *  que contiene el valor obtenido del coeficiente del Partido por el importe
     *  configurado para el torneo. */
    public function calcularPremioPartido($objPartido){
        $infoGanador = ['equipoGanador'=>null,'premioPartido'=>null] ;
        $equipoGanador = $objPartido->darEquipoGanador() ; 
        $coeficientePartido = $objPartido->coeficientePartido(); 
        $premioPartido = $this->getImportePremio() * $coeficientePartido ; 
        $infoGanador['equipoGanador'] = $equipoGanador ; 
        $infoGanador['premioPartido'] = $premioPartido; 
        return $infoGanador;
    }

   

}