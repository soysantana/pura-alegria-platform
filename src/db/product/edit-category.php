<?php
require_once('../../config/load.php');
page_require_level(1);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $req_fields = array('categoryName', 'categoryType');
    validate_fields($req_fields);

    if (empty($errors)) {
        $id = (int)$_POST['categoryId'];
        $name = $db->escape($_POST['categoryName']);
        $type = $db->escape($_POST['categoryType']);

        $sql = "UPDATE categories SET name='{$name}', status='{$type}' WHERE id='{$id}'";
        $result = $db->query($sql);

        if ($result && $db->affected_rows() === 1) {
            $session->msg('s', "Categoria o Marca actualizada correctamente.");
        } else {
            $session->msg('d', "No se pudo actualizar la categoria o marca.");
        }
        redirect('/products-category', false);
    } else {
        $session->msg('d', $errors);
        redirect('/products-category', false);
    }
}
