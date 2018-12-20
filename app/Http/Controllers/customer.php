<?php 
require_once "nusoap-0.9.5/lib/nusoap.php";
 $cliente = new nusoap_client("http://localhost:8888/WEB-SERVICE-PROYECTO/servicio.php?wsdl,'wsdl'");
 $resultado = $cliente->call("metodos.consulta",array(123));
 print($resultado);
 ?>