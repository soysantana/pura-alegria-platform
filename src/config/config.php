<?php
// Configuración de la zona horaria
date_default_timezone_set('America/Santo_Domingo');

define('DEVELOPMENT_MODE', false);

// Configuración de la base de datos
$env = parse_ini_file(dirname(__DIR__, 2) . '/.env');

define('DB_HOST', $env['DB_HOST']);
define('DB_USER', $env['DB_USER']);
define('DB_PASS', $env['DB_PASS']);
define('DB_NAME', $env['DB_NAME']);
