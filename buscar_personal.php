<?php

include 'conexion.php'; // Conexión a la base de datos

$nombre_personal = isset($_GET['nombre_personal']) ? trim($_GET['nombre_personal']) : '';

if (!empty($nombre_personal)) {

    // Separar términos por espacios
    $nombresArray = explode(' ', $nombre_personal);

    // Construcción de condiciones SQL dinámicas
    $conditions = [];
    foreach ($nombresArray as $term) {
        $conditions[] = "(numero_documento_personal LIKE ? OR nombres_personal LIKE ? OR apellido_paterno_personal LIKE ? OR apellido_materno_personal LIKE ?)";
    }

    $query = "SELECT id_personal, numero_documento_personal, nombres_personal, apellido_paterno_personal, apellido_materno_personal
            FROM maestro_personal 
            WHERE " . implode(' AND ', $conditions);

    // Preparar y vincular parámetros
    if ($stmt = $conexion->prepare($query)) {
        $params = [];
        foreach ($nombresArray as $term) {
            $likeTerm = "%" . $term . "%";
            $params = array_merge($params, array_fill(0, 4, $likeTerm));
        }

        $types = str_repeat('s', count($params));
        $stmt->bind_param($types, ...$params);

        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                echo '<div class="form_resultado_personal" data-id="' . htmlspecialchars($fila['id_personal']) . '">' .
                    htmlspecialchars($fila['numero_documento_personal']) . ' - ' .
                    htmlspecialchars($fila['nombres_personal']) . ' ' .
                    htmlspecialchars($fila['apellido_paterno_personal']) . ' ' .
                    htmlspecialchars($fila['apellido_materno_personal']) .
                    '</div>';
            }
        } else {
            echo '<div class="alert alert-warning">No se encontraron resultados. Intenta con otro término.</div>';
        }

        $stmt->close();
    } else {
        echo '<div class="alert alert-danger">Error al preparar la consulta: ' . $conexion->error . '</div>';
    }

} else {
    echo '<div class="alert alert-info">Por favor, ingresa un nombre para buscar.</div>';
}
?>