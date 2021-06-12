<?php
class conexion
{

    private $localhost;
    private $usuario;
    private $password;
    private $DB;

    public function __construct()
    {
        $this->localhost = 'localhost';
        $this->usuario = 'root';
        $this->password = '';
        $this->DB = 'apidb';
    }

    public function ConexionDB()
    {
        $conexion =  new mysqli($this->localhost, $this->usuario, $this->password, $this->DB );
        if($conexion->connect_errno){
            echo 'Hubo un error en la conexion a las Base de datos';
        }
        return $conexion;
    }
}
