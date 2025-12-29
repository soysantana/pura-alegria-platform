<?php
require_once('../../config/load.php');
page_require_level(1);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $req_fields = array('nameGroup', 'levelGroup');
    validate_fields($req_fields);

    if (empty($errors)) {
        $name = $db->escape($_POST['nameGroup']);
        $level = $db->escape($_POST['levelGroup']);
        $status = $db->escape($_POST['statusGroup']);

        $sql = "INSERT INTO user_groups (
            group_name,
            group_level,
            group_status
        ) VALUES (
            '{$name}',
            '{$level}',
            '{$status}'
        )";

        if ($db->query($sql)) {
            $session->msg('s', "Grupo agregado exitosamente.");
        } else {
            $session->msg('d', 'Lo siento, el grupo no se pudo agregar.');
        }
        redirect('/group-user', false);
    } else {
        $session->msg("d", $errors);
        redirect('/group-user', false);
    }
}
