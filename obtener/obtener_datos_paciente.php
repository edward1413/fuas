<?php

include '../conexion.php'; // Asegúrate de que este archivo contenga la conexión a la base de datos

$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($id && is_numeric($id)) { // Verificar que el ID sea un número
    $query = "SELECT
                id_tipo_documento_paciente,
                numero_documento_paciente,
                nombres_paciente,
                apellido_paterno_paciente,
                apellido_materno_paciente,
                fecha_nacimiento_paciente,
                genero_paciente
            FROM maestro_paciente 
            WHERE numero_documento_paciente = ?";

    if ($stmt = $conexion->prepare($query)) { // Verificar si la preparación fue exitosa
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($fila = $resultado->fetch_assoc()) {

            echo json_encode([
                'id_tipo_documento_paciente' => $fila['id_tipo_documento_paciente'],
                'numero_documento_paciente' => $fila['numero_documento_paciente'],
                'nombres_paciente' => $fila['nombres_paciente'],
                'apellido_paterno_paciente' => $fila['apellido_paterno_paciente'],
                'apellido_materno_paciente' => $fila['apellido_materno_paciente'],
                'fecha_nacimiento_paciente' => $fila['fecha_nacimiento_paciente'],
                'genero_paciente' => $fila['genero_paciente']
            ]);
        } else {
            echo json_encode(['error' => 'No se encontraron datos.']);
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