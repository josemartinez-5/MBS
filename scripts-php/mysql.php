<?php

class mysql {
    private $_conexion;
    public function __construct() {
        $host = "localhost";
        $user = "root2";
        $bd = "mbs";
        $pass = "";
        $port = 3306;
        $socket = "/var/run/mysqld/mysqld.sock";
        
        $this->_conexion = mysqli_connect($host, $user, $pass, $bd, $port, $socket); 
    }
    public function consulta($sql){
        $resultado = mysqli_query($this->_conexion,$sql);
        return $resultado;
    }
    public function connect_error(){
        $this->_conexion->connect_error;
    }
    public function close(){
        $this->_conexion->close();
    }
    public function error(){
        $this->_conexion->error;
    }
}

?>