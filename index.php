<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imprimir FUAS</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body class="p-3">
    <div class="container-fluid">
        <h1 class="text-center mb-4">IMPRESIÓN DE FUAS</h1>
        
        <div class="row g-3">
            <!-- Columna izquierda - Paciente -->
            <div class="col-lg-6">
                <div class="card card-dark mb-3">
                    <div class="card-body">
                        <h2 class="section-title">BUSCAR PACIENTE</h2>
                        <input type="text" id="nombre_paciente" class="form-control form-control-sm" 
                               placeholder="Ingrese el DNI o nombres" autocomplete="off">
                        <div id="resultados_paciente" class="search-results d-none"></div>
                    </div>
                </div>

                <div id="form_paciente" class="card card-dark mb-3 d-none">
                    <div class="card-body compact-form">
                        <h2 class="section-title">DATOS DEL USUARIO</h2>
                        <div class="row g-2">
                            <div class="col-md-4">
                                <label class="form-label">Nombres</label>
                                <input type="text" id="nombres_paciente" class="form-control form-control-sm" readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Apellido paterno</label>
                                <input type="text" id="apellido_paterno_paciente" class="form-control form-control-sm" readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Apellido materno</label>
                                <input type="text" id="apellido_materno_paciente" class="form-control form-control-sm" readonly>
                            </div>
                        </div>
                        <div class="row g-2 mt-1">
                            <div class="col-md-4">
                                <label class="form-label">Doc. Identidad</label>
                                <input type="text" id="documento_paciente" class="form-control form-control-sm" readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">F. Nacimiento</label>
                                <input type="text" id="fecha_nacimiento" class="form-control form-control-sm" readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Edad</label>
                                <input type="text" id="edad_paciente" class="form-control form-control-sm" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Columna derecha - Profesional -->
            <div class="col-lg-6">
                <div class="card card-dark mb-3">
                    <div class="card-body">
                        <h2 class="section-title">BUSCAR PROFESIONAL</h2>
                        <input type="text" id="nombre_personal" class="form-control form-control-sm" 
                               placeholder="Ingrese los datos" autocomplete="off">
                        <div id="resultados_personal" class="search-results d-none"></div>
                    </div>
                </div>

                <div id="form_personal" class="card card-dark mb-3 d-none">
                    <div class="card-body compact-form">
                        <h2 class="section-title">DATOS DEL PROFESIONAL</h2>
                        <div class="row g-2">
                            <div class="col-md-3">
                                <label class="form-label">DNI</label>
                                <input type="text" id="dni_personal" class="form-control form-control-sm" readonly>
                            </div>
                            <div class="col-md-9">
                                <label class="form-label">Nombres</label>
                                <input type="text" id="nombres_completos_personal" class="form-control form-control-sm" readonly>
                            </div>
                        </div>
                        <div class="row g-2 mt-1">
                            <div class="col-md-4">
                                <label class="form-label">Profesión</label>
                                <input type="text" id="profesion_personal" class="form-control form-control-sm" readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Colegiatura</label>
                                <input type="text" id="colegiatura_personal" class="form-control form-control-sm" readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Especialidad</label>
                                <input type="text" id="numero_especialidad_personal" class="form-control form-control-sm" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fila inferior - Opciones -->
        <div class="row g-3">
            <div class="col-md-6">
                <div class="card card-dark">
                    <div class="card-body">
                        <h2 class="section-title">LUGAR DE ATENCIÓN</h2>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="lugar_atencion" id="intramural" value="intramural">
                            <label class="form-check-label" for="intramural">INTRAMURAL</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="lugar_atencion" id="extramural" value="extramural">
                            <label class="form-check-label" for="extramural">EXTRAMURAL</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-dark">
                    <div class="card-body">
                        <h2 class="section-title">PRESTACIÓN</h2>
                        <div class="row g-2">
                            <div class="col-md-3">
                                <input type="text" id="codigo_prestacion" class="form-control form-control-sm" placeholder="Código prestacional">
                            </div>
                            <div class="col-md-9">
                                <input type="text" id="descripcion_prestacion" class="form-control form-control-sm" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Botón de imprimir -->
        <div class="text-center mt-4">
            <button id="btn-imprimir" type="button" class="btn btn-print">
                <i class="bi bi-printer-fill me-2"></i>IMPRIMIR
            </button>
        </div>
    </div>

    <!-- Campos ocultos -->
    <input type="hidden" id="id_profesion">
    <input type="hidden" id="genero-paciente">
    <input type="hidden" id="especialidad">

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
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
                id_profesion: document.getElementById("id_profesion").value,
                lugarAtencion: document.querySelector('input[name="lugar_atencion"]:checked')?.id || '',
                tipoAtencion: document.querySelector('input[name="tipo_atencion"]:checked')?.id || '',
            };

            localStorage.setItem("datosFua", JSON.stringify(data));
            window.open("print-fua.html", "_blank");
        });
    </script>

    <!-- Tus scripts personalizados -->
    <script src="scripts/scripts.js"></script>
    <script src="scripts/scripts_pacientes.js"></script>
    <script src="scripts/scripts_personal.js"></script>
    <script src="scripts/scripts_imprimir.js"></script>
</body>
</html>