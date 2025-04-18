<?php

include 'conexion.php'; // Asegúrate de que este archivo contenga la conexión a la base de datos

$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($id && is_numeric($id)) { // Verificar que el ID sea un número
    $query = "SELECT
                mp.numero_documento_personal,
                CONCAT(mp.nombres_personal, ' ', mp.apellido_paterno_personal, ' ', mp.apellido_materno_personal) AS nombres_completos_personal,
                p.descripcion AS profesion,
                mp.id_profesion,
                mp.numero_colegiatura,
                mp.especialidad,
                mp.numero_especialidad
            FROM maestro_personal mp
            JOIN profesion p ON mp.id_profesion = p.id_profesion
            WHERE mp.id_personal = ?";

    if ($stmt = $conexion->prepare($query)) { // Verificar si la preparación fue exitosa
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($fila = $resultado->fetch_assoc()) {
            // Devolver los datos en formato JSON
            echo json_encode([
                'numero_documento_personal' => $fila['numero_documento_personal'],
                'nombres_completos_personal' => $fila['nombres_completos_personal'],
                'profesion' => $fila['profesion'],
                'id_profesion' => $fila['id_profesion'],
                'numero_colegiatura' => $fila['numero_colegiatura'],
                'especialidad' => $fila['especialidad'],
                'numero_especialidad' => $fila['numero_especialidad']
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