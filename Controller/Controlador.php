<?php

namespace Controller;
use Model\Animal;

include_once ("Model/Animal.php");
class Controlador
{
    //inicializar el atributo de animal
    private $animal;

    public function __construct(){
        //a el atributo animal se crea el objeto Animal
        $this->animal = new Animal();
    }

    //metodo para visualizar los datos de la tabla
    public function mostrar(){
        $mostrar = $this->animal->mostrar();
        return $mostrar;
    }

    //metodo para registrar un animal la cual de parametros son los mismos atributos de la clase animal
    public function registrar($codigo,$nombre,$especie,$tipo,$peso,$edad,$dieta,$observacion){

        //se llama el metodo set de la clase animal
        $this->animal->set('codigo',$codigo);
        $this->animal->set('nombre',$nombre);
        $this->animal->set('especie',$especie);
        $this->animal->set('tipo',$tipo);
        $this->animal->set('peso',$peso);
        $this->animal->set('edad',$edad);
        $this->animal->set('dieta',$dieta);
        $this->animal->set('observacion',$observacion);

        //retornamos el metodo registrar para ejecutar la consulta sql y agregarlo a la base de datos
        return $this->animal->registrar();
    }

    //metodo preEliminar
    public function preEliminar($id_animal)
    {
        //accede al id del animal
        $this->animal->set('id_animal',$id_animal);

        //ejecuta el metodo para visualizar el animal antes de aliminarlo
        return $this->animal->preEliminar();
    }

    //metodo para eliminar un animal segun su id
    public function eliminar($id_animal)
    {
        //accede a el id del animal
        $this->animal->set('id_animal',$id_animal);

        //ejecuta el metodo de la clase animal para eliminar a el animal
        $this->animal->eliminar();
    }

    //metodo que tiene como parametro todos los atributos de la clase animal
    public function editar($id_animal,$codigo,$nombre,$especie,$tipo,$peso,$edad,$dieta,$observacion)
    {
        //se asigna cada valor recibido al atributo correspondiente del objeto animal usando el metodo set
        $this->animal->set('id_animal',$id_animal);
        $this->animal->set('codigo',$codigo);
        $this->animal->set('nombre',$nombre);
        $this->animal->set('especie',$especie);
        $this->animal->set('tipo',$tipo);
        $this->animal->set('peso',$peso);
        $this->animal->set('edad',$edad);
        $this->animal->set('dieta',$dieta);
        $this->animal->set('observacion',$observacion);

        //se llama el metodo editar del modelo Animal para ejecutar la consulta UPDATE en la base de datos
        $this->animal->editar();
    }

}