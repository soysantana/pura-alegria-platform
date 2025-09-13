<?php
require_once('../../config/load.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)$_POST['deleteId'];

    $id = delete_by_id('infants', $id);

    if ($id) {
        $session->msg("s", "Borrado exitosamente");
    } else {
        $session->msg("d", "No encontrado");
    }
    redirect('/src/pages/infant.php', false);
}
