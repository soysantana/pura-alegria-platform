<?php
require_once('../../config/load.php');
page_require_level(1);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $req_fields = array('categoryName', 'categoryType');
    validate_fields($req_fields);

    $name = trim($db->escape($_POST['categoryName']));
    $type = trim($db->escape($_POST['categoryType']));

    if (empty($errors)) {
        $sql = "INSERT INTO categories (name, status)
                VALUES ('{$name}', '{$type}')";

        if ($db->query($sql)) {
            $session->msg('s', "Categoría o marca guardada correctamente.");
        } else {
            $session->msg('d', 'No se pudo guardar la categoría o marca. Por favor, inténtalo nuevamente.');
        }
        redirect('/products-category', false);
    } else {
        $session->msg("d", $errors);
        redirect('/products-category', false);
    }
}
