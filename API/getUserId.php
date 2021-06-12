<?php
require_once '../Test/DB/DB.php';

class getUserId{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function query()
    {
        $query = "SELECT * FROM clientes";
        return $query;
    }

    public function queryId()
    {
        $id = $this->id;
        $query = "SELECT * FROM clientes WHERE id = '$id'";
        return $query;
    }
}

?>
