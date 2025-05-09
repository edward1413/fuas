<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CENTRO DE SALUD MENTAL COMUNITARIO DOS DE JUNIO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="icon" type="image/png" href="imagenes/favicon.png">
</head>

<body class="p-3">
    <div class="container-fluid">
        <div class="titulo-con-icono d-flex align-items-center justify-content-center mb-4">
            <img src="imagenes/favicon.png" alt="Ícono" class="me-3" style="width: 50px; height: auto;">
            <h1 class="text-center mb-0">CENTRO DE SALUD MENTAL COMUNITARIO DOS DE JUNIO</h1>
        </div>

        <h1 class="text-center mb-4">IMPRESIÓN DE FUAS</h1>

        <div class="row g-3">
            <!-- Columna izquierda - Paciente -->
            <div class="col-lg-6">
                <div class="card card-dark mb-3">
                    <div class="card-body">
                        <h2 class="section-title">BUSCAR PACIENTE</h2>
                        <input type="text" id="nombre_paciente" class="form-control form-control-sm"
                            placeholder="Ingrese los datos del usuario" autocomplete="off">
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
                                <input type="text" id="apellido_paterno_paciente" class="form-control form-control-sm"
                                    readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Apellido materno</label>
                                <input type="text" id="apellido_materno_paciente" class="form-control form-control-sm"
                                    readonly>
                            </div>
                        </div>
                        <div class="row g-2 mt-1">
                            <div class="col-md-4">
                                <label class="form-label">Doc. Identidad</label>
                                <input type="text" id="documento_paciente" class="form-control form-control-sm"
                                    readonly>
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
                            placeholder="Ingrese los datos del personal" autocomplete="off">
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
                                <input type="text" id="nombres_completos_personal" class="form-control form-control-sm"
                                    readonly>
                            </div>
                        </div>
                        <div class="row g-2 mt-1">
                            <div class="col-md-4">
                                <label class="form-label">Profesión</label>
                                <input type="text" id="profesion_personal" class="form-control form-control-sm"
                                    readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Colegiatura</label>
                                <input type="text" id="colegiatura_personal" class="form-control form-control-sm"
                                    readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Especialidad</label>
                                <input type="text" id="numero_especialidad_personal"
                                    class="form-control form-control-sm" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fila inferior - Opciones -->
        <div class="row g-3">
            <div class="col-md-6">
                <div class="card card-dark mb-3">
                    <div class="card-body">
                        <h2 class="section-title">PRESTACIÓN</h2>
                        <div class="row g-2">
                            <div class="col-md-3">
                                <input type="text" id="codigo_prestacion" class="form-control form-control-sm"
                                    placeholder="Código prestacional">
                            </div>
                            <div class="col-md-9">
                                <input type="text" id="descripcion_prestacion" class="form-control form-control-sm"
                                    placeholder="Prestación" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-dark">
                    <div class="card-body">
                        <h2 class="section-title">LUGAR DE ATENCIÓN</h2>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="lugar_atencion" id="intramural"
                                value="intramural">
                            <label class="form-check-label" for="intramural">INTRAMURAL</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="lugar_atencion" id="extramural"
                                value="extramural">
                            <label class="form-check-label" for="extramural">EXTRAMURAL</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card card-dark">
                <div class="card-body">
                    <div class="row g-2">
                        <div class="col-md-2">
                            <h2 class="section-title">DIAGNÓSTICO</h2>
                        </div>
                        <div class="col-md-1 form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="switchcie10">
                        </div>
                        <div class="col-md-9">
                            <input type="text" id="cie10" class="form-control form-control-sm"
                                placeholder="Buscar el diagnóstico aquí" autocomplete="off">
                            <div id="resultado_cie10" class="search-results d-none"></div>
                        </div>
                    </div>
                    <div id="form_diagnostico" class="row g-2">
                        <div class="col-md-3">
                            <input type="text" id="codigo_cie10" class="form-control form-control-sm"
                                placeholder="Código CIE-10">
                        </div>
                        <div class="col-md-9">
                            <input type="text" id="descripcion_cie10" class="form-control form-control-sm"
                                placeholder="Diagnóstico" readonly>
                        </div>
                    </div>
                    <small id="mensaje_deshabilitado" class="text-danger">
                        <i class="fas fa-lock"></i> Los campos están deshabilitados.
                    </small>
                    <small class="text-muted" id="mensaje_habilitado" style="display: none;">
                        <i class="fas fa-unlock text-info"></i> Los campos están habilitados.</small>
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
    <div class="container-fluid">
        <footer class="site-footer">
            <div class="footer-content">
                <p><strong>Edward Rivera Moreno</strong> - Ingeniero de Sistemas</p>
                <p>Centro de Salud Mental Comunitario Dos de Junio</p>
                <p>
                    <i class="bi bi-telephone-fill" style="color: #28a745;"></i> <strong>Fijo:</strong> (043) 700697
                    <!-- <i class="bi bi-phone-fill" style="color: #28a745;"></i> <strong> | Móvil:</strong> +51 987-654-321-->
                </p>
                <div class="social-links">
                    <a href="https://www.facebook.com/profile.php?id=100069548143051" target="_blank"><i
                            class="bi bi-facebook"></i> Facebook CSMC DOS DE JUNIO</a>
                </div>
                <p>&copy; 2025 Todos los derechos reservados.</p>
            </div>
        </footer>
    </div>
    <!-- Campos ocultos -->
    <input type="hidden" id="id_profesion">
    <input type="hidden" id="genero-paciente">
    <input type="hidden" id="especialidad">

    <!-- Bootstrap 5 JS  para el Bundle con el Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Tus scripts personalizados -->
    <script src="scripts/scripts.js"></script>
    <script src="scripts/scripts_pacientes.js"></script>
    <script src="scripts/scripts_personal.js"></script>
    <script src="scripts/scripts_diagnostico.js"></script>
    <script src="scripts/scripts_imprimir.js"></script>
</body>

</html>