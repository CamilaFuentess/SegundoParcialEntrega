<?php
class Categoria{
	private $idCategoria;
	private $descripcion;
	 

	public function __construct($idCategoria, $descripcion ){
		$this->idCategoria=$idCategoria;
		$this->descripcion= $descripcion;
	}
    public function setIdcategoria($idCategoria){
         $this->idCategoria= $idCategoria;
    }

    public function getIdCategoria(){
        return $this->idCategoria;
    }

    public function setDescripcion($descripcion){
         $this->descripcion= $descripcion;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }


    public function __toString(){
        //string $cadena
        $cadena = "IdCategori: ".$this->getidCategoria()."\n";
        $cadena = $cadena. "descripcion: ".$this->getDescripcion()."\n";
        return $cadena;
    }
}
?>
