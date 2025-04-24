$(document).ready(function () {
    let debounceTimer;
    let currentFocus = -1;

    // ==============================
    // BUSCAR PROFESIONAL
    // ==============================
    $('#nombre_personal').on('input', function () {
        clearTimeout(debounceTimer);
        const nombre = $(this).val();
        if (nombre.length >= 2) {
            debounceTimer = setTimeout(() => {
                $.ajax({
                    url: 'buscar/buscar_personal.php',
                    type: 'GET',
                    data: { nombre_personal: nombre },
                    success: function (data) {
                        const resultados = $('#resultados_personal');
                        resultados.html(data);
                        resultados.removeClass('d-none');
                        currentFocus = -1; // Reiniciar el índice de enfoque
                    },
                    error: function (xhr, status, error) {
                        console.error('Error en la búsqueda:', error);
                        $('#resultados_personal').html(
                            '<div class="search-item text-danger">Error al buscar al personal</div>'
                        ).removeClass('d-none');
                    }
                });
            }, 400);
        } else {
            $('#resultados_personal').addClass('d-none').empty();
            $('#form_personal').addClass('d-none');
        }
    });

    // ==============================
    // CLIC EN RESULTADO PROFESIONAL
    // ==============================
    $(document).on('click', '#resultados_personal .search-item', function () {
        seleccionarPersonal($(this));
    });

    // ==============================
    // Navegación con teclado
    // ==============================
    $('#nombre_personal').on('keydown', function (e) {
        const resultados = $('#resultados_personal .search-item');
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
                seleccionarPersonal(resultados.eq(currentFocus));
            }
        }
    });

    function seleccionarPersonal(item) {
        const idPersonal = item.data('id');
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
    }

    // Cerrar resultados al hacer clic fuera (Nueva funcionalidad)
    $(document).on('click', function (e) {
        if (!$(e.target).closest('#nombre_personal, #resultados_personal').length) {
            $('#resultados_personal').addClass('d-none');
        }
    });
});
