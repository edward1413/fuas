<?php
include '../conexion.php'; // Conexión a la base de datos

$codigo_cie10 = isset($_GET['codigo_cie10']) ? trim($_GET['codigo_cie10']) : '';

if (!empty($codigo_cie10)) {
    // Separar términos por espacios
    $nombresArray = explode(' ', $codigo_cie10);

    // Construcción de condiciones SQL dinámicas
    $conditions = [];
    foreach ($nombresArray as $term) {
        $conditions[] = "(codigo_cie10 LIKE ? OR descripcion_cie10 LIKE ?)";
    }

    $query = "SELECT id_diagnostico, codigo_cie10, descripcion_cie10
            FROM diagnostico
            WHERE " . implode(' AND ', $conditions);

    // Preparar y vincular parámetros
    if ($stmt = $conexion->prepare($query)) {
        $params = [];
        foreach ($nombresArray as $term) {
            $likeTerm = "%" . $term . "%";
            $params = array_merge($params, array_fill(0, 2, $likeTerm));
        }

        $types = str_repeat('s', count($params));
        $stmt->bind_param($types, ...$params);

        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                echo '<div class="search-item" data-id="' . htmlspecialchars($fila['id_diagnostico']) . '">' .
                    '<div class="fw-bold">' . htmlspecialchars($fila['descripcion_cie10']) . '</div>' .
                    '<div class="small">CIE-10: ' . htmlspecialchars($fila['codigo_cie10']) . '</div>' .
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

