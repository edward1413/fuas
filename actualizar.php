<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACTUALIZAR USUARIOS</title>
    <link rel="stylesheet" href="styles/styles_actualizar.css">
</head>

<body>
    <main class="container">
        <h1>ACTUALIZAR USUARIOS</h1>
        <p class="subtitle">Sube un archivo CSV con los datos de los usuarios a actualizar</p>

        <form id="uploadForm" method="post" enctype="multipart/form-data" class="upload-container">
            <div class="form-group">
                <label for="inputGroupFile04" class="file-label">Seleccionar archivo CSV</label>
                <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="fileHelp" name="file"
                    accept=".csv" required>
                <small id="fileHelp" class="help-text">Solo se aceptan archivos .csv con un tamaño máximo de 5MB</small>
            </div>

            <button type="submit" class="btn-upload">
                <span class="spinner" aria-hidden="true"></span>
                <span class="btn-text">SUBIR ARCHIVO</span>
            </button>
			<!-- Debajo del botón -->
<progress id="uploadProgress" value="0" max="100" style="width: 100%; display: none;"></progress>
<p id="uploadStatus" class="help-text"></p>

        </form>

        <div id="response" role="alert"></div>
    </main>
<script src="scripts/script_actualizar.js"></script>
</body>

</html>