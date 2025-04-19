<?php

include 'conexion.php'; // Asegúrate de que este archivo contenga la conexión a la base de datos

$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($id && is_numeric($id)) { // Verificar que el ID sea un número
    $query = "SELECT id_diagnostico, codigo_cie10, descripcion_cie10
            FROM diagnostico
            WHERE id_diagnostico = ?";

    if ($stmt = $conexion->prepare($query)) { // Verificar si la preparación fue exitosa
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($fila = $resultado->fetch_assoc()) {
            // Devolver los datos en formato JSON
            echo json_encode([
                'codigo_cie10' => $fila['codigo_cie10'],
                'descripcion_cie10' => $fila['descripcion_cie10']
            ]);
        } else {
            echo json_encode(['error' => 'No se encontraron datos para este personal.']);
        }

        $stmt->close(); // Cerrar la declaración
    } else {
        // Manejo de error en la preparación de la consulta
        echo json_encode(['error' => 'Error al preparar la consulta.']);
    }
} else {
    // Manejo de error si el ID no es válido
    echo json_encode(['error' => 'ID no válido.']);
}
?>