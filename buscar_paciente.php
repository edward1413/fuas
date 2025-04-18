<?php

include 'conexion.php'; // Conexión a la base de datos

$nombre_paciente = isset($_GET['nombre_paciente']) ? trim($_GET['nombre_paciente']) : '';

if (!empty($nombre_paciente)) {

    // Separar términos por espacios
    $nombresArray = explode(' ', $nombre_paciente);

    // Construcción de condiciones SQL dinámicas
    $conditions = [];
    foreach ($nombresArray as $term) {
        $conditions[] = "(numero_documento_paciente LIKE ? OR nombres_paciente LIKE ? OR apellido_paterno_paciente LIKE ? OR apellido_materno_paciente LIKE ?)";
    }

    $query = "SELECT numero_documento_paciente, nombres_paciente, apellido_paterno_paciente, apellido_materno_paciente, fecha_nacimiento_paciente, genero_paciente 
            FROM maestro_paciente 
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
                echo '<div class="form_resultado_paciente" data-id="' . htmlspecialchars($fila['numero_documento_paciente']) . '">' .
                    htmlspecialchars($fila['numero_documento_paciente']) . ' - ' .
                    htmlspecialchars($fila['nombres_paciente']) . ' ' .
                    htmlspecialchars($fila['apellido_paterno_paciente']) . ' ' .
                    htmlspecialchars($fila['apellido_materno_paciente']) .
                    '</div>';
            }
        } else {
            echo '<div class="alert alert-warning">No se encontraron resultados. Intenta nuevamente.</div>';
        }

        $stmt->close();
    } else {
        echo '<div class="alert alert-danger">Error al preparar la consulta: ' . $conexion->error . '</div>';
    }

} else {
    echo '<div class="alert alert-info">Por favor, ingresa un nombre para buscar.</div>';
}
?>