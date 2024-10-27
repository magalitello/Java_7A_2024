<?php
$archivo = 'data.txt'; // Verifica que este sea el nombre correcto y esté en la misma carpeta

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $linea_a_eliminar = htmlspecialchars($_POST['elemento']);
    
    if (file_exists($archivo)) {
        $contenido = file($archivo);
        $nueva_lista = [];

        // Recorre las líneas y elimina la que coincida
        foreach ($contenido as $linea) {
            if (trim($linea) !== $linea_a_eliminar) {
                $nueva_lista[] = $linea;
            }
        }

        // Guarda la nueva lista en el archivo
        file_put_contents($archivo, implode("", $nueva_lista));
        echo "Elemento eliminado correctamente.";
    } else {
        echo "No se ha encontrado el archivo.";
    }
}
?>

<!-- Formulario para eliminar un elemento -->
<form method="post" action="delete.php">
    <label for="elemento">Elemento a eliminar:</label>
    <input type="text" name="elemento" id="elemento" required>
    <button type="submit">Eliminar</button>
</form>
