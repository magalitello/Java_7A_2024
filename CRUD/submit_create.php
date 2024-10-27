<?php
$archivo = 'data.txt'; // Verifica que este sea el nombre correcto y esté en la misma carpeta

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nuevo_elemento = htmlspecialchars($_POST['elemento']);
    
    if (!empty($nuevo_elemento)) {
        // Agregar el nuevo elemento al archivo
        file_put_contents($archivo, $nuevo_elemento . PHP_EOL, FILE_APPEND);
        echo "Elemento creado correctamente.";
    } else {
        echo "Por favor, ingresa un elemento válido.";
    }
}
?>

<!-- Formulario para crear un nuevo elemento -->
<form method="post" action="submit_create.php">
    <label for="elemento">Nuevo elemento:</label>
    <input type="text" name="elemento" id="elemento" required>
    <button type="submit">Crear</button>
</form>
