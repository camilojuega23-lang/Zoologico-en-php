<?php

namespace Model;

//paso 0
class Connection
{
    //inicializacion de atributos los cuales tienen que ver con la base datos
    private $host;
    private $usuario;
    private $pass;
    private $db;
    private $con;

    public function __construct(){

        //se asignan los valores los atributos
        $this->host = "localhost";
        $this->usuario = "root";
        $this->pass = "";
        $this->db = "zoologico";

        //aqui se establece la conexion a la base de datos
        $this->con =mysqli_connect($this->host,$this->usuario,$this->pass,$this->db);

    }

    /*
     * los metodos creados a continuacion se crean para que las
     * consultas se EJECUTEN.
     */


    //si se hace una consulta sql y esta no devuelve nada, solo muestra usa esto
    public function consultaSimple($query)
    {
        $resultado = mysqli_query($this->con,$query);
        if(!$resultado){
            die("Error en consulta: " . mysqli_error($this->con));
        }
        return $resultado;
    }

    //una consulta sql la cual se espera una resultado
    public function consultaRetorno($query)
    {
        return mysqli_query($this->con,$query);
    }

}