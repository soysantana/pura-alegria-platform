<?php
ob_start();

try {
    require_once('src/config/load.php'); // Aquí puede fallar si no hay conexión DB

    if (!$session->isUserLoggedIn(true)) {
        // Usuario NO logueado
        redirect('src/pages/signin.php');
    } else {
        // Usuario logueado
        redirect('src/pages/home.php');
    }
} catch (Throwable $e) {
    // Maneja cualquier error que ocurra (como falta de conexión)
    // Puedes hacer log del error si quieres: error_log($e->getMessage());
    header('Location: public/503.php');
    exit;
}
