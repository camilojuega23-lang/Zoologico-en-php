<?php
//titulo de la vista
echo "<h2>Registro de Animales</h2>";
//se crea un fomulario el cual usa un metodo post para enviar los datos
echo "<form action='?cargar=registrar' method='POST'>";

//formulario con los atributos de la clase animal con la cual se llena la base de datos
echo "<label>Codigo: </label><br> ";
echo "<input type='text' name='codigo' ><br><br>";
echo "<label>Nombre: </label><br> ";
echo "<input type='text' name='nombre' ><br><br>";
echo "<label>Especie: </label><br> ";
echo "<input type='text' name='especie' ><br><br>";
echo "<label>Tipo: </label><br> ";
echo "<input type='text' name='tipo' ><br><br>";
echo "<label>Peso: </label><br> ";
echo "<input type='text' name='peso' ><br><br>";
echo "<label>Edad: </label><br> ";
echo "<input type='text' name='edad' ><br><br>";
echo "<label>Dieta: </label><br> ";
echo "<input type='text' name='dieta' ><br><br>";
echo "<label>Observaciones: </label><br> ";
echo "<input type='text' name='observacion' ><br><br>";

echo "<input type='submit' name='enviar' value='Enviar'>  <input type='submit' name='cancelar' value='Cancelar'>";

echo "</form>";

//se instancia el objeto controlador
$controlador = new \Controller\Controlador();


//se crea un condicional donde se pregunta si existe?(isset) el boton enviar
if(isset($_POST["enviar"])){

    //una variable resultado guarda el registro que se haga en el formulario usando $_POST['atributos del formulario']
    $resultado = $controlador->registrar($_POST['codigo'], $_POST['nombre'], $_POST['especie'], $_POST['tipo'], $_POST['peso'],$_POST['edad'],$_POST['dieta'],$_POST['observacion'] );


    //si el restultado es true, se guarda el registro
    if($resultado){
        echo "Agregado con exito";
    }
    //si hay un codigo para mas de un animal genera un error y no guarda el formulario
    else{
        echo "El codigo ya existe";
    }
}

if (isset($_POST['cancelar'])){

    //cuando cancele la accion vuelve a la pagina que estaba
    header('location: index.php?cargar=mostrar');
}