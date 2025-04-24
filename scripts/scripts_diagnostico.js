$(document).ready(function () {
    let debounceTimer;
    let currentFocus = -1;

    // ==============================
    // BUSCAR CIE10
    // ==============================
    $('#cie10').on('input', function () {
        this.value = this.value.toUpperCase(); // Convierte a mayúsculas mientras se escribe
        clearTimeout(debounceTimer);
        const nombre = $(this).val();
        if (nombre.length >= 2) {
            debounceTimer = setTimeout(() => {
                $.ajax({
                    url: 'buscar/buscar_diagnostico.php',
                    type: 'GET',
                    data: { codigo_cie10: nombre },
                    success: function (data) {
                        const resultados = $('#resultado_cie10');
                        resultados.html(data);
                        resultados.removeClass('d-none');
                        currentFocus = -1; // Reiniciar el índice de enfoque
                    },
                    error: function (xhr, status, error) {
                        console.error('Error en la búsqueda:', error);
                        $('#resultado_cie10').html(
                            '<div class="search-item text-danger">Error al buscar el diagnóstico.</div>'
                        ).removeClass('d-none');
                    }
                });
            }, 400);
        } else {
            $('#resultado_cie10').addClass('d-none').empty();
        }
    });

    // ==============================
    // CLIC EN RESULTADO CIE10
    // ==============================
    $(document).on('click', '#resultado_cie10 .search-item', function () {
        seleccionarDiagnostico($(this));
    });

    // ==============================
    // Navegación con teclado
    // ==============================
    $('#cie10').on('keydown', function (e) {
        const resultados = $('#resultado_cie10 .search-item');
        if (e.keyCode === 40) { // Flecha abajo
            e.preventDefault();
            currentFocus++;
            if (currentFocus >= resultados.length) currentFocus = 0;
            resultados.removeClass('active');
            resultados.eq(currentFocus).addClass('active');
        } else if (e.keyCode === 38) { // Flecha arriba
            e.preventDefault();
            currentFocus--;
            if (currentFocus < 0) currentFocus = resultados.length - 1;
            resultados.removeClass('active');
            resultados.eq(currentFocus).addClass('active');
        } else if (e.keyCode === 13) { // Enter
            e.preventDefault();
            if (currentFocus > -1) {
                seleccionarDiagnostico(resultados.eq(currentFocus));
            }
        }
    });

    function seleccionarDiagnostico(item) {
        const idDiagnostico = item.data('id');
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
                console.error('Error al obtener detalles del diagnóstico:', error);
                // Mostrar alerta solo si hay un error real de conexión
                if (xhr.status !== 200) {
                    alert('Error al cargar los datos del diagnóstico');
                }
            }
        });
    }

    // Cerrar resultados al hacer clic fuera (Nueva funcionalidad)
    $(document).on('click', function (e) {
        if (!$(e.target).closest('#cie10, #resultado_cie10').length) {
            $('#resultado_cie10').addClass('d-none');
        }
    });
});
