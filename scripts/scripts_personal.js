// ==============================
// BUSCAR PROFESIONAL
// ==============================
$('#nombre_personal').on('input', function () {
    const nombre = $(this).val();
    if (nombre.length > 0) {
        $.ajax({
            url: 'buscar_personal.php',
            type: 'GET',
            data: { nombre_personal: nombre },
            success: function (data) {
                $('#resultados_personal').html(data);
            },
            error: function (xhr, status, error) {
                console.error('Error en la búsqueda:', error);
            }
        });
    } else {
        $('#resultados_personal').empty();
        $('#form_personal').hide();
    }
});

// ==============================
// CLIC EN RESULTADO PROFESIONAL
// ==============================

$(document).on('click', '.form_resultado_personal', function () {
    const idPersonal = $(this).data('id');
    $('#nombre_personal').val('');
    $('#resultados_personal').empty();
    $.ajax({
        url: 'obtener_datos_personal.php',
        type: 'GET',
        data: { id: idPersonal },
        success: function (data) {
            try {
                const personal = JSON.parse(data);
                if (personal.error) {
                    alert('No se encontraron datos para este profesional.');
                    return;
                }
                $('#dni_personal').val(personal.numero_documento_personal);
                $('#nombres_completos_personal').val(personal.nombres_completos_personal).attr('title', personal.nombres_completos);
                $('#profesion_personal').val(personal.profesion);
                $('#colegiatura_personal').val(personal.numero_colegiatura);
                $('#especialidad').val(personal.especialidad);
                $('#numero_especialidad_personal').val(personal.numero_especialidad);
                $('#id_profesion').val(personal.id_profesion); // Asegúrate de almacenar el id_profesion
                $('#form_personal').show();
            } catch (e) {
                console.error('Error al parsear JSON:', e);
            }
        },
        error: function (xhr, status, error) {
            console.error('Error al obtener detalles del profesional:', error);
        }
    });
});
