// ==============================
// BUSCAR PROFESIONAL
// ==============================
$('#nombre_personal').on('input', function () {
    const nombre = $(this).val();
    if (nombre.length >= 2) {
        $.ajax({
            url: 'buscar/buscar_personal.php',
            type: 'GET',
            data: { nombre_personal: nombre },
            success: function (data) {
                const resultados = $('#resultados_personal');
                resultados.html(data);
                resultados.removeClass('d-none');
            },
            error: function (xhr, status, error) {
                console.error('Error en la búsqueda:', error);
                $('#resultados_personal').html(
                    '<div class="search-item text-danger">Error al buscar al personal</div>'
                ).removeClass('d-none');
            }
        });
    } else {
        $('#resultados_personal').addClass('d-none').empty();
        $('#form_personal').addClass('d-none');
    }
});

// ==============================
// CLIC EN RESULTADO PROFESIONAL
// ==============================

$(document).on('click', '#resultados_personal .search-item', function () {
    const idPersonal = $(this).data('id');
    $('#nombre_personal').val('');
    $('#resultados_personal').addClass('d-none').empty();
    
    $.ajax({
        url: 'obtener/obtener_datos_personal.php',
        type: 'GET',
        dataType: 'json',
        data: { id: idPersonal },
        success: function (personal) {

            // Rellenar campos
            $('#dni_personal').val(personal.numero_documento_personal);
            $('#nombres_completos_personal').val(personal.nombres_completos_personal)
                .attr('title', personal.nombres_completos);
            $('#profesion_personal').val(personal.profesion);
            $('#colegiatura_personal').val(personal.numero_colegiatura);
            $('#especialidad').val(personal.especialidad);
            $('#numero_especialidad_personal').val(personal.numero_especialidad);
            $('#id_profesion').val(personal.id_profesion);
            
            $('#form_personal').removeClass('d-none');
        },
        error: function (xhr, status, error) {
            console.error('Error al obtener detalles del profesional:', error);
            // Mostrar alerta solo si hay un error real de conexión
            if (xhr.status !== 200) {
                alert('Error al cargar los datos del profesional');
            }
        }
    });
});

// Cerrar resultados al hacer clic fuera (Nueva funcionalidad)
$(document).on('click', function (e) {
    if (!$(e.target).closest('#nombre_personal, #resultados_personal').length) {
        $('#resultados_personal').addClass('d-none');
    }
});