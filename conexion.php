<?php
// Configuración BASE (ajusta según tu estructura)
define('ROOT_PATH', __DIR__); // Ruta física absoluta
define('BASE_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/fuas_csmcddj/');

// Configuración de la base de datos
define('DB_HOST', 'localhost');
define('DB_USER', 'fua_user');
define('DB_PASS', '340860');
define('DB_NAME', 'fuas_csmcddj');

// Autenticación y sesión
session_start();

// Crear la conexión a la base de datos
$conexion = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Importante: establece charset para evitar problemas con tildes y ñ
$conexion->set_charset("utf8mb4");


// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>