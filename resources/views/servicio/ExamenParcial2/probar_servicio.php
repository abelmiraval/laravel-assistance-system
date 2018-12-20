<?php
include"registro.php";
$registro = new registro();
print("El retorno es:");
 //$m= $registro->registrarIngreso("2017-11-07",200);
 //$m= $registro->registrarEgreso("2017-11-07",200);
 //$m= $registro->registrarIngresoEgreso("2017-11-07",200,100);
$m= $registro->consultarGanancia("2017-11-07");

gettype($m);
print_r($m);
?>