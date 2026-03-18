<?php
//instanciamos el objeto controlador
$controlador = new \Controller\Controlador();

//muestra unicamente el animal
if(isset($_GET['id_animal'])){

    //llamamos el metodo preEliminar que viene del controlador para visualizar el animal unicamente
    $registro = $controlador->preEliminar($_GET['id_animal']);
}

if (isset($_POST['editar']))
{
    //usamos el metodo editar de la clase controlador, el cual tiene todos los editables en post y obtiene el id (no editable) con get
    $controlador->editar($_GET['id_animal'], $_POST['codigo'], $_POST['nombre'], $_POST['especie'], $_POST['tipo'], $_POST['peso'], $_POST['edad'], $_POST['dieta'], $_POST['observacion']);
    //cuando se elimina vuelve a el index
    header('location: index.php?cargar=mostrar');
}
if (isset($_POST['cancelar'])){

    //cuando cancele la accion vuelve a la pagina que estaba
    header('location: index.php?cargar=mostrar');
}
echo "<h2>Editar animal</h2>";
echo "<form action='' method='POST'>";
    echo "<table border='1'>";
        echo "<thead>";
            echo "<th>Codigo</th>";
            echo "<th>Nombre</th>";
            echo "<th>Especie</th>";
            echo "<th>Tipo</th>";
            echo "<th>Peso</th>";
            echo "<th>Edad</th>";
            echo "<th>Dieta</th>";
            echo "<th>Observaciones</th>";
            echo "<th>Acciones</th>";
        echo "</thead>";
        echo "<tbody>";
            echo "<tr>";
                echo "<td>";
                    echo "{$registro['codigo']}";
                    echo "<input type='hidden' name='codigo' value='{$registro['codigo']}'>";
                echo "</td>";
                echo "<td>";
                    echo "<input type='text' name='nombre' value='{$registro['nombre']}'>";
                echo "</td>";
                echo "<td>";
                    echo "<input type='text' name='especie' value='{$registro['especie']}'>";
                echo "</td>";
                echo "<td>";
                    echo "<input type='text' name='tipo' value='{$registro['tipo']}'>";
                echo "</td>";
                echo "<td>";
                    echo "<input type='text' name='peso' value='{$registro['peso']}'>";
                echo "</td>";
                echo "<td>";
                    echo "<input type='text' name='edad' value='{$registro['edad']}'>";
                echo "</td>";
                echo "<td>";
                    echo "<input type='text' name='dieta' value='{$registro['dieta']}'>";
                echo "</td>";
                echo "<td>";
                    echo "<input type='text' name='observacion' value='{$registro['observacion']}'>";
                echo "</td>";
                echo "<td>";
                    echo "<input type=submit value='Editar' name='editar'> <input type=submit value='Cancelar' name='cancelar'>";
                echo "</td>";
            echo "</tr>";
        echo "</tbody>";
    echo "</table>";
echo "</form>";