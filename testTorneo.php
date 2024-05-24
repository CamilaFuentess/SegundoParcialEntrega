<?php
include_once("Categoria.php");
include_once("Torneo.php");
include_once("Equipo.php");
include_once("Partido.php");
include_once("PartidoFutbol.php");
include_once("PartidoBasquet.php");

$catMayores = neW Categoria(1,'Mayores');
$catJuveniles = neW Categoria(2,'juveniles');
$catMenores = neW Categoria(1,'Menores');

$objE1 = neW Equipo("Equipo Uno", "Cap.Uno",1,$catMayores);
$objE2 = neW Equipo("Equipo Dos", "Cap.Dos",2,$catMayores);

$objE3 = neW Equipo("Equipo Tres", "Cap.Tres",3,$catJuveniles);
$objE4 = neW Equipo("Equipo Cuatro", "Cap.Cuatro",4,$catJuveniles);

$objE5 = neW Equipo("Equipo Cinco", "Cap.Cinco",5,$catMayores);
$objE6 = neW Equipo("Equipo Seis", "Cap.Seis",6,$catMayores);

$objE7 = neW Equipo("Equipo Siete", "Cap.Siete",7,$catJuveniles);
$objE8 = neW Equipo("Equipo Ocho", "Cap.Ocho",8,$catJuveniles);

$objE9 = neW Equipo("Equipo Nueve", "Cap.Nueve",9,$catMenores);
$objE10 = neW Equipo("Equipo Diez", "Cap.Diez",9,$catMenores);

$objE11 = neW Equipo("Equipo Once", "Cap.Once",11,$catMayores);
$objE12 = neW Equipo("Equipo Doce", "Cap.Doce",11,$catMayores);

$objTorneo = new Torneo([],100000);

//crear 3 objetos partidos de Básquet
$objPartidoBasquet1 = new PartidoBasquet(11,"2024-05-05",$objE7,80,$objE8,120,7);
$objPartidoBasquet2 = new PartidoBasquet(12,"2024-05-06",$objE9,81,$objE10,110,8);
$objPartidoBasquet3 = new PartidoBasquet(13,"2024-05-07",$objE11,115,$objE12,85,9);

//Crear 3 objetos partidos de Fútbol c
$objPartidoFutbol1 = new PartidoFutbol(14,"2024-07-07",$objE1,3,$objE2,2,null);
$objPartidoFutbol2 = new PartidoFutbol(15,"2024-05-08",$objE3,0,$objE4,1,null);
$objPartidoFutbol3 = new PartidoFutbol(16,"2024-05-09",$objE5,2,$objE6,3,null);

$coleccionPartidos = [
    $objPartidoBasquet1,$objPartidoBasquet2,$objPartidoBasquet3,
    $objPartidoFutbol1,$objPartidoFutbol2,$objPartidoFutbol3,
];

$objTorneo->setColPartidos($coleccionPartidos);

//a. ingresarPartido($objE5, $objE11, '2024-05-23', 'Futbol'); visualizar la 
//respuesta y la cantidad de equipos del torneo
$nuevoPartido = $objTorneo->ingresarPartido($objE5,$objE11,"2024-05-23","Futbol") ;
$contadorEquipos = count($objTorneo->getColPartidos()); 

echo "Cantidad de equipos participando en el torneo: " . $contadorEquipos . "\n";
if ($nuevoPartido!=null){
    echo "Partido agregado con exito. Aqui estan los datos \n" . $nuevoPartido . "\n";
} else {
    echo "El partido NO pudo ser agregado al torneo\n";
}

//b. ingresarPartido($objE11, $objE11, '2024-05-23', 'basquetbol') ; visualizar la
//respuesta y la cantidad de equipos del torneo.
$nuevoPartido2 = $objTorneo->ingresarPartido($objE11,$objE11,"2024-05-23","Basquet"); 
$contadorEquipos = count($objTorneo->getColPartidos()); 
echo "Cantidad de equipos participando en el torneo: " . $contadorEquipos . "\n";
if ($nuevoPartido2!=null){
    echo "Partido agregado con exito. Aqui estan los datos inicializados \n" . $nuevoPartido2 . "\n";
} else {
    echo "El partido NO pudo ser agregado al torneo\n";
}

//c. IngresarPartido($objE9, $objE10, '2024-05-25', 'basquetbol'); visualizar la
//respuesta y la cantidad de equipos del torneo
$nuevoPartido3 = $objTorneo->ingresarPartido($objE9,$objE10,"2024-05-25","Basquet");
$contadorEquipos = count($objTorneo->getColPartidos()); 
echo "Cantidad de equipos participando en el torneo: " . $contadorEquipos . "\n";
if ($nuevoPartido3!=null){
    echo "Partido agregado con exito. Aqui estan los datos inicializados \n" . $nuevoPartido3 . "\n";
} else {
    echo "El partido NO pudo ser agregado al torneo\n";
}

$colGanadoresBasquet = $objTorneo->darGanadores("Basquet"); 
$i=1;
foreach ($colGanadoresBasquet as $unGanadorBasquet){
    echo "Datos del equipo ganador de basquet nro " . $i . "\n";
    echo $unGanadorBasquet . "\n"; 
    $i++;
}

$colGanadoresFutbol = $objTorneo->darGanadores("Futbol"); 
$a=1;
foreach ($colGanadoresFutbol as $unGanadorFutbol){
    echo "Datos del equipo ganador de futbol nro " . $a ."\n"; 
    echo $unGanadorFutbol . "\n"; 
    $a++;
}

echo $objTorneo->__toString() ."\n";

?>
