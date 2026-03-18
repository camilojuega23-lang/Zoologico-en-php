<?php
//instanciamos el objeto controlador
$controlador = new \Controller\Controlador();

//muestra unicamente el animal
if (isset($_GET['id_animal'])) {

    //llamamos el metodo preEliminar que viene del controlador para visualizar el animal unicamente
    $registro = $controlador->preEliminar($_GET['id_animal']);
}

//elimina por completo el animal
if (isset($_POST['eliminar'])) {

    //ahora se elimina el animal
    $controlador->eliminar($_GET['id_animal']);
    //cuando se elimina vuelve a el index
    header('location: index.php');
}

//
if (isset($_POST['cancelar'])) {

    //cuando cancele la accion vuelve a la pagina que estaba
    header('location: index.php?cargar=mostrar');
}

echo "<h2> Eliminar un animal </h2>";

echo "<form action='' method='POST'>";

echo "<table border='1'>";
    echo "<thead>";
        echo "<th>ID</th>";
        echo "<th>Codigo</th>";
        echo "<th>Nombre</th>";
        echo "<th>Especie</th>";
        echo "<th>Tipo</th>";
        echo "<th>Peso</th>";
        echo "<th>Edad</th>";
        echo "<th>Dieta</th>";
        echo "<th>Observaciones</th>";
        echo "<th>Confirmacion</th>";
    echo "</thead>";
    echo "<tbody>";
        echo "<tr>";
            //es necesario usar {} para que no se dañe el codigo
            echo "<td> {$registro['id_animal']}</td>";
            echo "<td> {$registro['codigo']} </td>";
            echo "<td> {$registro['nombre']} </td>";
            echo "<td> {$registro['especie']} </td>";
            echo "<td> {$registro['tipo']} </td>";
            echo "<td> {$registro['peso']} </td>";
            echo "<td> {$registro['edad']} </td>";
            echo "<td> {$registro['dieta']} </td>";
            echo "<td> {$registro['observacion']} </td>";
            echo "<td> <input type='submit' name='eliminar' value='Eliminar'> <input type='submit' name='cancelar' value='Cancelar'>";
            echo "</td>";
        echo "</tr>";
    echo "</tbody>";
echo "</table>";
echo "</form>";

