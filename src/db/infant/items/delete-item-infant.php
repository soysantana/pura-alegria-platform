<?php
require_once('../../../config/load.php');
page_require_level(2);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_infant = (int) base64_decode($_GET['id']);
    $id = (int) base64_decode($_POST['deleteId']);

    $id = delete_by_id('item_infants', $id);

    if ($id) {
        $session->msg("s", "Borrado exitosamente");
    } else {
        $session->msg("d", "No encontrado");
    }
    redirect('/item-infant-edit?id=' . base64_encode((int)$id_infant), false);
}
