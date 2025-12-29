<?php
ob_start();

try {
    require_once('src/config/load.php');

    if (!$session->isUserLoggedIn(true)) {
        // Usuario NO logueado
        redirect('/signin');
    } else {
        // Usuario logueado
        redirect('/home.');
    }
} catch (Throwable $e) {
    // Maneja cualquier error que ocurra
    header('Location: public/503.php');
    exit;
}
