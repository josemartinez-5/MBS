<?php

class mysql {
    private $_conexion;
    public function __construct() {
        $host = "localhost";
        $user = "root2";
        $bd = "mbs";
        $pass = "SeraTemporal#7";
        $port = 3306;
        $socket = "/var/run/mysqld/mysqld.sock";
        
        $this->_conexion = mysqli_connect($host, $user, $pass, $bd, $port, $socket); 
    }
    public function consulta($sql){
        $resultado = mysqli_query($this->_conexion,$sql);
        return $resultado;
    }
}

?>