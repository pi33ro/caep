<?php

class conectar
{

    public function conexion()
    {
        $servername = "localhost";
        $database = "caep_bd";
        $username = "root";
        $password = "";
        $conexion = mysqli_connect($servername, $username, $password, $database);
        return $conexion;
    }
}
