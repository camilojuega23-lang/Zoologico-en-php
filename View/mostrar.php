<?php

use Controller\Controlador;

//instanciamos el objeto controlador
$controlador = new Controlador();

//guardamos el metodo mostrar en una variable
$animales = $controlador->mostrar();

echo "<h2>Lista de Animales</h2>";
echo "<table border='1'>";
echo "<tr><th> ID </th><th> Código </th><th> Nombre </th><th> Especie </th><th> Tipo </th><th> Peso </th><th> Edad </th><th> Dieta </th><th> Observaciones </th><th> Acciones </th></tr>";

//recorre animal en animales para mostrarlo en pantalla
while ($animal = mysqli_fetch_assoc($animales)) {
    echo "<tr>";
    echo "<td>" . $animal['id_animal'] . "</td>";
    echo "<td>" . $animal['codigo'] . "</td>";
    echo "<td>" . $animal['nombre'] . "</td>";
    echo "<td>" . $animal['especie'] . "</td>";
    echo "<td>" . $animal['tipo'] . "</td>";
    echo "<td>" . $animal['peso'] . "</td>";
    echo "<td>" . $animal['edad'] . "</td>";
    echo "<td>" . $animal['dieta'] . "</td>";
    echo "<td>" . ($animal['observacion']) . "</td>";
    //acciones que van a tener cada uno de los animales eliminar o editar los animales
    echo "<td><a href='?cargar=eliminar&id_animal={$animal['id_animal']}'>Eliminar</a> | <a href='?cargar=editar&id_animal={$animal['id_animal']}'=>Editar</a></td>";
    echo "</tr>";
}

echo "</table>";

echo "<p><a href='?cargar=registrar'>Pulse aqui para agregar un animal</a></p>";

