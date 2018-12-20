<?php 
	class Conexion{

		private $con;
		// private $datos=array(
		// 	"host"=>"127.0.0.1",
		// 	"user"=>"root",
		// 	"password"=>"",
		// 	"db"=>"bdregistro",
		// 	"puerto"=>"33065"
		// );


		public function __construct(){
			$this->con = new mysqli("127.0.0.1", "root", "", "bdregistro", 33065);
			if ($this->con->connect_errno) {
			    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
		}

		public function consultaSimple($sql){
			$this->con->query($sql)or die(mysqli_error());
		
		}

		public function consultaRetorno($sql){
			$r=$this->con->query($sql);		
			//var_dump($sql);	
				
			$filas=mysqli_fetch_array($r,MYSQLI_ASSOC);
			return $filas;
		}

		public function consultaRetornoArray($sql){
			$lista=array();
			$r=$this->con->query($sql)or die(mysqli_error());	

			while($filas=mysqli_fetch_array($r,MYSQLI_ASSOC)){
				$lista[]=$filas;
			}

			return $lista;
		}

	}
 ?>