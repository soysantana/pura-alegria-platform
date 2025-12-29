<?php
require_once('../../config/load.php');
page_require_level(2);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)$_POST['deleteId'];

    $id = delete_by_id('activities', $id);

    if ($id) {
        $session->msg("s", "Borrado exitosamente");
    } else {
        $session->msg("d", "No encontrado");
    }
    redirect('/add-activity', false);
}
