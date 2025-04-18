$(document).ready(function () {
    let debounceTimer;

    // ==============================
    // BUSCAR PACIENTE
    // ==============================
    $('#nombre_paciente').on('input', function () {
        clearTimeout(debounceTimer);
        const nombre = $(this).val();

        if (nombre.length > 0) {
            debounceTimer = setTimeout(() => {
                $.ajax({
                    url: 'buscar_paciente.php',
                    type: 'GET',
                    data: { nombre_paciente: nombre },
                    success: function (data) {
                        $('#resultados_paciente').html(data);
                    },
                    error: function (xhr, status, error) {
                        console.error('Error en la búsqueda:', error);
                        $('#resultados_paciente').html('<div class="alert alert-danger">Error al buscar paciente</div>');
                    }
                });
            }, 400);
        } else {
            $('#resultados_paciente').empty();
            $('#form_paciente').hide();
        }
    });

    // ==============================
    // CLIC EN RESULTADO PACIENTE (solo uno)
    // ==============================
    $(document).on('click', '.form_resultado_paciente', function () {
        const idPaciente = $(this).data('id');
        $('#nombre_paciente').val('');
        $('#resultados_paciente').empty();

        $.ajax({
            url: 'obtener_datos_paciente.php',
            type: 'GET',
            dataType: 'json',
            data: { id: idPaciente },
            success: function (paciente) {
                if (paciente.error) {
                    alert('No se encontraron datos para este usuario.');
                    return;
                }

                // Rellenar campos
                $('#id_tipo_documento_paciente').val(paciente.id_tipo_documento_paciente);
                $('#documento_paciente').val(paciente.numero_documento_paciente);
                $('#nombres_paciente').val(paciente.nombres_paciente || '');
                $('#apellido_paterno_paciente').val(paciente.apellido_paterno_paciente || '');
                $('#apellido_materno_paciente').val(paciente.apellido_materno_paciente || '');
                $('#fecha_nacimiento').val(paciente.fecha_nacimiento_paciente || '');
                $('#genero-paciente').val(paciente.genero_paciente || '');

                // Mostrar marca de género con X
                const genero = paciente.genero_paciente;
                const marcaGenero = $('#genero-paciente-marca');

                marcaGenero.text(''); // Limpia marca anterior
                marcaGenero.css({ top: '', left: '', position: 'absolute' });

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

                $('#form_paciente').show();
            },
            error: function (xhr, status, error) {
                console.error('Error al obtener detalles del paciente:', error);
                alert('Error al cargar los datos del paciente');
            }
        });
    });

    // Función para calcular edad
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
