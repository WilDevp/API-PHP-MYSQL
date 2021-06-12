<?php
/* $conexion = mysqli_connect("localhost","root","","apidb");
$responyse = array();
if($conexion){
    $sql = "SELECT * FROM clientes WHERE id = 1";
    $result = mysqli_query($conexion,$sql);
        if($result){
            header("Content-Type: JSON");
            $i=0;
            while($row = mysqli_fetch_assoc($result)){
                $response [$i]['id'] = $row ['id'];
                $response [$i]['nombre'] = $row ['nombre'];
                $response [$i]['apellido'] = $row ['apellido'];
                $response [$i]['correo'] = $row ['correo'];
                $response [$i]['empresa'] = $row ['empresa'];
                $i++;
            }
            echo json_encode($response, JSON_PRETTY_PRINT);
        }
    }
 */

require_once '../Test/DB/DB.php';

header("Content-Type: aplication/json");
class Usuario
{

    private $nombre;
    private $apellido;
    private $correo;
    private $empresa;

    public function __construct($nombre, $apellido, $correo, $empresa)
    {

        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->empresa = $empresa;
    }
    //CRUD

    public function saveClient()
    {
        /*  $content = file_get_contents("../Test/API/client.json");
        $client = json_decode($content, true);
        $client[] = array(
            "nombre"=> $this->nombre,
            "apellido"=> $this->apellido,
            "correo" => $this->correo,
            "empresa" => $this->empresa
        );
        $content = fopen("../Test/API/client.json","w");
        fwrite($content, json_encode($client));
        fclose($content); */

        $nombre = $this->nombre;
        $apellido = $this->apellido;
        $correo = $this->correo;
        $empresa = $this->empresa;
        $conexion = new conexion();
        $conexion->ConexionDB()->query("INSERT INTO clientes(nombre, apellido, correo, empresa) VALUES ('$nombre', '$apellido', '$correo', '$empresa')");
    }
}


