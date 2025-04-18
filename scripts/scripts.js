// ==============================
// VALIDACION DE CODIGO PRESTACIONAL
// ==============================
document.getElementById('codigo_prestacion').addEventListener('input', function () {
    this.value = this.value.replace(/\D/g, ''); // Elimina cualquier carácter que no sea un dígito
    if (this.value.length > 3) {
        this.value = this.value.slice(0, 3); // Limita el valor a 3 dígitos
    }
});

document.getElementById('codigo_prestacion').addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
        const codigo = this.value; // Obtener el código ingresado
        const descripcionInput = document.getElementById('descripcion_prestacion'); // Obtener el campo de descripción

        fetch('buscar_prestacion.php?codigo=' + encodeURIComponent(codigo))
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    descripcionInput.value = data.descripcion; // Mostrar la descripción
                } else {
                    descripcionInput.value = 'Código no encontrado'; // Mostrar mensaje de error en el campo de descripción
                }
            })
            .catch(error => {
                console.error('Error:', error);
                descripcionInput.value = 'Error al buscar'; // Mensaje de error en caso de fallo en la solicitud
            });
    }
});