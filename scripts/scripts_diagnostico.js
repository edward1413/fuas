// ==============================
// BUSCAR CIE10
// ==============================
$('#cie10').on('input', function () {
    const nombre = $(this).val();
    if (nombre.length >= 2) {
        $.ajax({
            url: 'buscar/buscar_diagnostico.php',
            type: 'GET',
            data: { codigo_cie10: nombre },
            success: function (data) {
                const resultados = $('#resultado_cie10');
                resultados.html(data);
                resultados.removeClass('d-none');
            },
            error: function (xhr, status, error) {
                console.error('Error en la búsqueda:', error);
                $('#resultado_cie10').html(
                    '<div class="search-item text-danger">Error al buscar el diagnóstico.</div>'
                ).removeClass('d-none');
            }
        });
    } else {
        $('#resultado_cie10').addClass('d-none').empty();
    }
});

// ==============================
// CLIC EN RESULTADO CIE10
// ==============================

$(document).on('click', '#resultado_cie10 .search-item', function () {
    const idDiagnostico = $(this).data('id');
    $('#cie10').val('');
    $('#resultado_cie10').addClass('d-none').empty();

    $.ajax({
        url: 'obtener/obtener_datos_diagnostico.php',
        type: 'GET',
        dataType: 'json',
        data: { id: idDiagnostico },
        success: function (diagnostico) {
            console.log('Datos recibidos:', diagnostico); // Agrega esto temporalmente
            // Rellenar campos
            $('#codigo_cie10').val(diagnostico.codigo_cie10);
            $('#descripcion_cie10').val(diagnostico.descripcion_cie10);
            $('#form_diagnostico').removeClass('d-none');
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
    if (!$(e.target).closest('#codigo_cie10, #resultado_cie10').length) {
        $('#resultado_cie10').addClass('d-none');
    }
});