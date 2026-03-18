<?php
namespace Model;
include_once ("Connection.php");

//paso 1
class Animal
{
    //inicializar los atributos del animal
    private $id_animal;
    private $codigo;
    private $nombre;
    private $especie;
    private $tipo;
    private $peso;
    private $edad;
    private $dieta;
    private $observacion;

    private $con;

    //estableciendo conexion con connection
    public function __construct()
    {
        $this->con = new Connection();
    }

    //metodo set para no hacer los getter y setters
    public function set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    //metodo para mostrar la tabla de los animales registrados con una query
    public function mostrar()
    {

        //consulta para mostrar todos los resultados de la base de datos
        $query = "SELECT * FROM animal";
        //esta consulta genera un resultado por eso se pone consultaRetorno
        return $this->con->consultaRetorno($query);


    }

    //metodo para registrar un animal sin que se repita el codigo del animal
    public function registrar()
    {

        //consulta para que no se agregen animales con el mismo codigo
        $query = "SELECT * FROM animal WHERE codigo = '$this->codigo'";

        //ejecuta la consulta y devuelve el resultado
        $resultado = $this->con->consultaRetorno($query);

        //obtiene la cantidad de filas encontradas si este es mayor a 0  existe un animal con este codigo
        $filas = mysqli_num_rows($resultado);

        //si no existe un animal con ese codigo se puede registrar el animal
        if($filas == 0){

            //consulta para agregar un animal a la base de datps
            $query2 = "INSERT INTO animal (codigo, nombre, especie, tipo, peso, edad, dieta, observacion) VALUES ('$this->codigo','$this->nombre','$this->especie','$this->tipo','$this->peso','$this->edad','$this->dieta','$this->observacion') ";
            //esta consulta no devulve un  resultado para mostrar, solo lo agrega
            $this->con->consultaSimple($query2);
            //indica que el registro fue hecho
            return true;

        }
        else{

            //si el animal ya esta registrado  devuelve un false, haciendo que el registro no se complete
            return false;
        }
    }


    //metodo de preEliminar para ir en conjunto con eliminar, para poder visualizar el animal antes de eliminarlo definitivamente
    public function preEliminar()
    {

        //consulta para visualizar el animal animal segun su id
        $query = "SELECT * FROM animal WHERE id_animal = '$this->id_animal'";

        //ejecucion de la consulta
        $resultado = $this->con->consultaRetorno($query);

        //devuelve el resultado en un arreglo para que se visualice sino tira un error
        return mysqli_fetch_assoc($resultado);
    }

    //metodo para eliminar un animal
    public function eliminar()
    {
        //consulta para eliminar un animal segun su codigo
        $query = "DELETE FROM animal WHERE id_animal = '$this->id_animal'";

        //ejecuta la consulta
        $this->con->consultaSimple($query);
    }

    //metodo para actualizar los datos del animal
    public function editar()
    {
        //consulta para actualizar el registro de cada animal
        $query = "UPDATE animal SET codigo='$this->codigo', nombre='$this->nombre', especie='$this->especie', tipo='$this->tipo', peso='$this->peso', edad='$this->edad', dieta='$this->dieta', observacion='$this->observacion' WHERE id_animal='$id_animal' ";

        //ejecucion de la consulta
        $this->con->consultaSimple($query);
    }


}