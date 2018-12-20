<?php
	require_once 'nusoap-0.9.5/lib/nusoap.php';
	include "conexion.php";
	include "registro.php";

	function registrarIngreso($fecha,$ingreso) 
	 {
	 	$registro = new registro();
	 	$resultado=$registro->registrarIngreso($fecha,$ingreso);
	  	return $resultado['resultado'];	
	 }

	 function registrarEgreso($fecha,$egreso){
	 	$registro= new registro();
	 	$resultado=$registro->registrarEgreso($fecha,$egreso);
	 	return $resultado['resultado'];	
	 }


	 function registrarIngresoEgreso($fecha,$ingreso,$egreso){
	 	$registro= new registro();
	 	$resultado=$registro->registrarIngresoEgreso($fecha,$ingreso,$egreso);
	 	return $resultado['resultado'];	
	 }

	 function consultarGanancia($fecha){
	 	$registro= new registro();
	 	$ganancia=$registro->consultarGanancia($fecha);
	 	return $ganancia['ganancia'];
	 }

	

	$soap = new soap_server;
	$soap->configureWSDL('ExamenService','http://php.hoshmand.org/');
	$soap->wsdl->schemaTargetNamespace = 'http://soapinterop.org/xsd/';
	$soap->wsdl->schemaTargetNamespace = 'urn:listarRegistrosWsdl';

	$soap->register('registrarIngreso',array('fecha' => 'xsd:string','ingreso' => 'xsd:int'),array('resultado' => 'xsd:string'),'http://soapinterop.org/');
	$soap->register('registrarEgreso',array('fecha' => 'xsd:string','egreso' => 'xsd:int'),array('resultado' => 'xsd:string'),'http://soapinterop.org/');
	$soap->register('consultarGanancia',array('fecha' => 'xsd:string'),array('ganancia' => 'xsd:int'),'http://soapinterop.org/');
	// $soap->register('registrarIngresoEgreso',array('fecha' => 'xsd:string','ingreso'=>'xsd:int','egreso'=>'xsd:int'),array('resultado' => 'xsd:string'),'http://soapinterop.org/');

	$soap->register('registrarIngresoEgreso',array('fecha' => 'xsd:string','ingreso'=>'xsd:int','egreso'=>'xsd:int'),array('resultado' => 'xsd:string'),'http://soapinterop.org/');

	$soap->service(isset($HTTP_RAW_POST_DATA) ?
	$HTTP_RAW_POST_DATA : '');

		


  
  ?>
