<?php
include 'conexion.php'; // Asegúrate de que este archivo esté en el mismo directorio

if (isset($_GET['codigo_cie10'])) {
    $codigo_cie10 = $_GET['codigo_cie10'];

    // Prepara la consulta
    $sql = "SELECT id_diagnostico, codigo_cie10, descripcion_cie10
            FROM diagnostico WHERE codigo_cie10 = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $codigo_cie10); // Asumiendo que 'codigo' es de tipo string
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode(['success' => true, 'descripcion_cie10' => $row['descripcion_cie10']]);
    } else {
        echo json_encode(['success' => false]);
    }

    $stmt->close();
}

$conexion->close();
?>