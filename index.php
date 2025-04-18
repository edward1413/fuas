<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imprimir FUAS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/styles_imprimir.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="text-light" style="padding: 20px;">
    <div class="container">
        <h1 class="text-center mb-5 titulo-seccion">IMPRESIÓN DE FUAS</h1>
        <div class="row">
            <!-- Buscar Paciente -->
            <div class="col-md-6 mb-4">
                <div class="card-dark p-3">
                    <h2 class="titulo-seccion">BUSCAR PACIENTE</h2>
                    <input type="text" id="nombre_paciente" class="form-control input-dark"
                        placeholder="Ingrese el DNI o nombres" autocomplete="off">
                    <div id="resultados_paciente" class="resultados-container"></div>
                </div>

                <form id="form_paciente" class="card-dark p-3 mt-3" style="display: none;">
                    <h2 class="titulo-seccion">DATOS DEL USUARIO</h2>
                    <div class="row mb-2">
                        <div class="col"><label>Nombres</label><input type="text" id="nombres_paciente"
                                class="form-control input-dark" readonly></div>
                        <div class="col"><label>Apellido paterno</label><input type="text"
                                id="apellido_paterno_paciente" class="form-control input-dark" readonly></div>
                        <div class="col"><label>Apellido materno</label><input type="text"
                                id="apellido_materno_paciente" class="form-control input-dark" readonly></div>
                    </div>
                    <div class="row">
                        <div class="col"><label>Documento</label><input type="text" id="documento_paciente"
                                class="form-control input-dark" readonly></div>
                        <div class="col"><label>F. Nacimiento</label><input type="text" id="fecha_nacimiento"
                                class="form-control input-dark" readonly></div>
                        <div class="col"><label>Edad</label><input type="text" id="edad_paciente"
                                class="form-control input-dark" readonly></div>
                    </div>
                </form>
            </div>

            <!-- Buscar Profesional -->
            <div class="col-md-6 mb-4">
                <div class="card-dark p-3">
                    <h2 class="titulo-seccion">BUSCAR PROFESIONAL</h2>
                    <input type="text" id="nombre_personal" class="form-control input-dark"
                        placeholder="Ingrese los datos" autocomplete="off">
                    <div id="resultados_personal" class="resultados-container"></div>
                </div>

                <form id="form_personal" class="card-dark p-3 mt-3" style="display: none;">
                    <h2 class="titulo-seccion">DATOS DEL PROFESIONAL</h2>
                    <div class="row mb-2">
                        <div class="col custom-col-30"><label>DNI</label><input type="text" id="dni_personal"
                                class="form-control input-dark" readonly></div>
                        <div class="col custom-col-70"><label>Nombres</label><input type="text"
                                id="nombres_completos_personal" class="form-control input-dark" readonly></div>
                    </div>
                    <div class="row">
                        <div class="col"><label>Profesión</label><input type="text" id="profesion_personal"
                                class="form-control input-dark" readonly></div>
                        <div class="col"><label>Colegiatura</label><input type="text" id="colegiatura_personal"
                                class="form-control input-dark" readonly></div>
                        <div class="col"><label>Especialidad</label><input type="text" id="numero_especialidad_personal"
                                class="form-control input-dark" readonly></div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Lugar / Tipo de atención / Prestación -->
        <div class="row mb-4">
            <div class="col-md-6 mb-4">
                <div class="card-dark p-3">
                    <h2 class="titulo-seccion">LUGAR DE ATENCIÓN</h2>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="lugar_atencion" id="intramural"
                            value="intramural">
                        <label class="form-check-label" for="intramural">INTRAMURAL</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="lugar_atencion" id="extramural"
                            value="extramural">
                        <label class="form-check-label" for="extramural">EXTRAMURAL</label>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card-dark p-3">
                    <h2 class="titulo-seccion">PRESTACIÓN</h2>
                    <input type="text" id="codigo_prestacion" class="form-control input-dark mb-2"
                        placeholder="Código prestacional">
                    <input type="text" id="descripcion_prestacion" class="form-control input-dark" readonly>
                </div>
            </div>
        </div>

        <!-- Botón de imprimir -->
        <div class="text-center">
            <button id="btn-imprimir" type="button" class="btn btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="me-2"
                    viewBox="0 0 16 16">
                    <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                    <path
                        d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1" />
                </svg>
                IMPRIMIR
            </button>
        </div>
    </div>


    <input type="hidden" id="id_profesion">
    <input type="hidden" id="genero-paciente">
    <input type="hidden" id="especialidad">
    <script>
    document.getElementById("btn-imprimir").addEventListener("click", function () {
        const data = {
            nombres: document.getElementById("nombres_paciente").value,
            apellidoPaterno: document.getElementById("apellido_paterno_paciente").value,
            apellidoMaterno: document.getElementById("apellido_materno_paciente").value,
            fechaNacimiento: document.getElementById("fecha_nacimiento").value,

            numeroDocumento: document.getElementById("documento_paciente").value,
            genero: document.getElementById("genero-paciente").value,

            prestacion: document.getElementById("codigo_prestacion").value,

            profesionalNombre: document.getElementById("nombres_completos_personal").value,
            profesion: document.getElementById("profesion_personal").value,
            numeroColegiatura: document.getElementById("colegiatura_personal").value,
            especialidad: document.getElementById("especialidad").value,
            numemroEspecialidad: document.getElementById("numero_especialidad_personal").value,
            dni: document.getElementById("dni_personal").value,
            id_profesion: document.getElementById("id_profesion").value, // Asegúrate de recuperar el id_profesion

            lugarAtencion: document.querySelector('input[name="lugar_atencion"]:checked')?.id || '',
            tipoAtencion: document.querySelector('input[name="tipo_atencion"]:checked')?.id || '',
        };

        localStorage.setItem("datosFua", JSON.stringify(data));
        window.open("print-fua.html", "_blank");
    });
</script>


    <script src="scripts/scripts.js"></script>
    <script src="scripts/scripts_pacientes.js"></script>
    <script src="scripts/scripts_personal.js"></script>
    <script src="scripts/scripts_imprimir.js"></script>

</body>