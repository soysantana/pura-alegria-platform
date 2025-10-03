<?php
require_once(__DIR__ . '/../config/load.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $session->logout(); // destruye la sesión
    redirect("/signin"); // redirige al login o home
} else {
    header("HTTP/1.1 405 Method Not Allowed");
    echo "Método no permitido";
    exit;
}
