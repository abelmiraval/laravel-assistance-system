<?php

class conexion{
          

  public function conectar(){
  	   $cn = new mysqli("127.0.0.1", "root", "", "sisdistribuidos", 33065);
       return $cn; 
  }

}
?>