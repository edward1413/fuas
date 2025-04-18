<?php
include 'conexion.php'; // Asegúrate de que este archivo esté en el mismo directorio

if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];

    // Prepara la consulta
    $sql = "SELECT descripcion FROM prestacion WHERE codigo = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $codigo); // Asumiendo que 'codigo' es de tipo string
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode(['success' => true, 'descripcion' => $row['descripcion']]);
    } else {
        echo json_encode(['success' => false]);
    }

    $stmt->close();
}

$conexion->close();
?>