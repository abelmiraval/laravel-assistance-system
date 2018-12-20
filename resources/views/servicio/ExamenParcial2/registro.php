<?php 

require_once "conexion.php";

	class registro{
		private $id;
		private $fecha;
		private $ingreso;
		private $egreso;
		private $saldo;
		private $con;
		private $mensaje = array('resultado' => "Se registro con exito");

		public function __construct(){
			$this->con=new conexion();
		}

		public function get($atributo){
			return $this->$atributo;
		}

		public function set($atributo, $contenido){
			$this->$atributo=$contenido;
		}

		public function registrarIngreso($fecha, $ingreso){

				$consultar_ultimo_registro="SELECT * FROM registros ORDER BY id DESC LIMIT 1";
				$dato_ultimo_registro =$this->con->consultaRetorno($consultar_ultimo_registro);
				$sql="INSERT INTO registros(fecha,ingreso,egreso,saldo) VALUES ('$fecha','$ingreso',0,$dato_ultimo_registro[saldo]+$ingreso)";
				$this->con->consultaSimple($sql);				
				return $this->mensaje;
		}

		public function registrarEgreso($fecha, $egreso){
				$consultar_ultimo_registro="SELECT * FROM registros ORDER BY id DESC LIMIT 1";
				$dato_ultimo_registro =$this->con->consultaRetorno($consultar_ultimo_registro);
				$sql="INSERT INTO registros(fecha,ingreso,egreso,saldo) VALUES ('$fecha',0,$egreso,$dato_ultimo_registro[saldo]-$egreso)";
				$this->con->consultaSimple($sql);
				return $this->mensaje;
		}
		public function registrarIngresoEgreso($fecha, $ingreso,$egreso){

				$consultar_ultimo_registro="SELECT * FROM registros ORDER BY id DESC LIMIT 1";
				$dato_ultimo_registro =$this->con->consultaRetorno($consultar_ultimo_registro);
				$sql="INSERT INTO registros(fecha,ingreso,egreso,saldo) VALUES ('$fecha',$ingreso,$egreso,$dato_ultimo_registro[saldo]-$egreso+$ingreso)";
				$this->con->consultaSimple($sql);
				return $this->mensaje;

		}

		// 	public function modificarIngreso($fecha, $ingreso){

		// 		$consultar_ultimo_registro="SELECT * FROM registros ORDER BY id DESC LIMIT 1";
		// 		$dato_ultimo_registro =$this->con->consultaRetorno($consultar_ultimo_registro);
		// 		$sql="UPDATE  registros set ingreso=$ingreso WHERE fecha='$fecha'";
		// 		$this->con->consultaSimple($sql);
		// 		return $this->mensaje;

		// }

		public function consultarGanancia($fecha){
				$consulta="SELECT ingreso-egreso as ganancia FROM registros WHERE fecha='$fecha'";
				$dato =$this->con->consultaRetorno($consulta);
				
				return $dato;
		}

		public function listarRegistros(){
				$consulta="SELECT * FROM registros ";
				$lista =$this->con->consultaRetornoArray($consulta);
				return $lista;
		}			


	}

 ?>