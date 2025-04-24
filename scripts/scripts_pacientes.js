$(document).ready(function () {
    let debounceTimer;
    let currentFocus = -1;

    // ==============================
    // BUSCAR PACIENTE (Actualizado para Bootstrap 5)
    // ==============================
    $('#nombre_paciente').on('input', function () {
        clearTimeout(debounceTimer);
        const nombre = $(this).val();

        if (nombre.length >= 2) {
            debounceTimer = setTimeout(() => {
                $.ajax({
                    url: 'buscar/buscar_paciente.php',
                    type: 'GET',
                    data: { nombre_paciente: nombre },
                    success: function (data) {
                        const resultados = $('#resultados_paciente');
                        resultados.html(data);
                        resultados.removeClass('d-none'); // Mostrar resultados (Bootstrap 5)
                        currentFocus = -1; // Reiniciar el índice de enfoque
                    },
                    error: function (xhr, status, error) {
                        console.error('Error en la búsqueda:', error);
                        $('#resultados_paciente').html(
                            '<div class="search-item text-danger">Error al buscar paciente</div>'
                        ).removeClass('d-none');
                    }
                });
            }, 400);
        } else {
            $('#resultados_paciente').addClass('d-none').empty();
            $('#form_paciente').addClass('d-none');
        }
    });

    // ==============================
    // CLIC EN RESULTADO PACIENTE (Actualizado)
    // ==============================
    $(document).on('click', '#resultados_paciente .search-item', function () {
        seleccionarPaciente($(this));
    });

    // ==============================
    // Navegación con teclado
    // ==============================
    $('#nombre_paciente').on('keydown', function (e) {
        const resultados = $('#resultados_paciente .search-item');
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
                seleccionarPaciente(resultados.eq(currentFocus));
            }
        }
    });

    function seleccionarPaciente(item) {
        const idPaciente = item.data('id');
        $('#nombre_paciente').val('');
        $('#resultados_paciente').addClass('d-none').empty();

        $.ajax({
            url: 'obtener/obtener_datos_paciente.php',
            type: 'GET',
            dataType: 'json',
            data: { id: idPaciente },
            success: function (paciente) {
                // Rellenar campos
                $('#id_tipo_documento_paciente').val(paciente.id_tipo_documento_paciente);
                $('#documento_paciente').val(paciente.numero_documento_paciente);
                $('#nombres_paciente').val(paciente.nombres_paciente || '');
                $('#apellido_paterno_paciente').val(paciente.apellido_paterno_paciente || '');
                $('#apellido_materno_paciente').val(paciente.apellido_materno_paciente || '');
                $('#fecha_nacimiento').val(paciente.fecha_nacimiento_paciente || '');
                $('#genero-paciente').val(paciente.genero_paciente || '');

                // Mostrar marca de género con X (ajusta según tu diseño)
                const genero = paciente.genero_paciente;
                const marcaGenero = $('#genero-paciente-marca');

                marcaGenero.text('').removeAttr('style'); // Limpia marca anterior

                if (genero === 'M') {
                    marcaGenero.text('XM').css({ top: '14cm', left: '4cm' });
                } else if (genero === 'F') {
                    marcaGenero.text('XF').css({ top: '14.5cm', left: '4cm' });
                }

                // Calcular edad
                if (paciente.fecha_nacimiento_paciente) {
                    const edad = calcularEdad(paciente.fecha_nacimiento_paciente);
                    $('#edad_paciente').val(edad);
                }

                $('#form_paciente').removeClass('d-none'); // Mostrar formulario (Bootstrap 5)
            },
            error: function (xhr, status, error) {
                console.error('Error al obtener detalles del paciente:', error);
                alert('Error al cargar los datos del paciente');
            }
        });
    }

    // Cerrar resultados al hacer clic fuera (Nueva funcionalidad)
    $(document).on('click', function (e) {
        if (!$(e.target).closest('#nombre_paciente, #resultados_paciente').length) {
            $('#resultados_paciente').addClass('d-none');
        }
    });

    // Función para calcular edad (sin cambios)
    function calcularEdad(fechaNacimiento) {
        const nacimiento = new Date(fechaNacimiento);
        const hoy = new Date();
        let edad = hoy.getFullYear() - nacimiento.getFullYear();
        const mes = hoy.getMonth() - nacimiento.getMonth();
        if (mes < 0 || (mes === 0 && hoy.getDate() < nacimiento.getDate())) {
            edad--;
        }
        return edad + ' Años';
    }
});
