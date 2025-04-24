<?php
include '../conexion.php'; // Conexión a la base de datos

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
                echo '<div class="search-item" data-id="' . htmlspecialchars($fila['id_personal']) . '">' .
                    '<div class="fw-bold">' . htmlspecialchars($fila['nombres_personal']) . ' ' .
                    htmlspecialchars($fila['apellido_paterno_personal']) . ' ' .
                    htmlspecialchars($fila['apellido_materno_personal']) . '</div>' .
                    '<div class="small">DNI: ' . htmlspecialchars($fila['numero_documento_personal']) . '</div>' .
                    '</div>';
            }
        } else {
            echo '<div class="search-item text-muted">No se encontraron resultados. Intenta con otro término.</div>';
        }

        $stmt->close();
    } else {
        echo '<div class="search-item text-danger">Error en la búsquda</div>';
    }
} else {
    echo '<div class="alert alert-info">Por favor, ingresa un nombre para buscar.</div>';
}
?>