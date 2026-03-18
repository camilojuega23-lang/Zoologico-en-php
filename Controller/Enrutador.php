<?php

namespace Controller;

class Enrutador
{
    public function cargarVista($vista){
        // Usamos un switch para determinar qué vista se debe mostrar
        // dependiendo del valor recibido desde el index u otro controlador
        switch ($vista){
            case 'mostrar':
                include_once ("View/mostrar.php");
                break;
            case 'registrar':
                include_once ("View/registrar.php");
                break;
            case 'editar':
                include_once ("View/editar.php");
                break;
            case 'eliminar':
                include_once ("View/eliminar.php");
                break;
            default:
                include_once ("View/inicio.php");
        }
    }

    public function validarVista($variable){

        if(empty($variable)){
                include_once ("View/inicio.php");
        }
        else{
            return true;
        }
    }

}