<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_a_editar = $_POST['nombre'];
    $nueva_descripcion = $_POST['descripcion'];

    // Leer todos los elementos en el archivo y modificarlos
    if (file_exists("data.txt")) {
        $contenido = file("data.txt", FILE_IGNORE_NEW_LINES);
        foreach ($contenido as &$linea) {
            if (stripos($linea, "Nombre: " . $nombre_a_editar) !== false) {
                $linea = "Nombre: " . $nombre_a_editar . " - Descripción: " . $nueva_descripcion;
            }
        }
        // Escribir los cambios de vuelta en el archivo
        file_put_contents("data.txt", implode("\n", $contenido) . "\n");
    }

    // Redirigir de vuelta al index.html
    header("Location: index.html");
    exit();
}
?>
