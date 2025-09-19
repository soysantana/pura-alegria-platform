<?php
require_once('../../config/load.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $req_fields = array('nameGroup', 'levelGroup', 'statusGroup');
    validate_fields($req_fields);

    if (empty($errors)) {
        $id = (int)$_POST['groupId'];
        $name = $db->escape($_POST['nameGroup']);
        $level = $db->escape($_POST['levelGroup']);
        $status = $db->escape($_POST['statusGroup']);

        $sql = "UPDATE user_groups SET group_name='{$name}', group_level='{$level}', group_status='{$status}' WHERE id='{$id}'";
        $result = $db->query($sql);

        if ($result && $db->affected_rows() === 1) {
            $session->msg('s', "El grupo " . htmlentities($name) . ", fue actualizada correctamente.");
        } else {
            $session->msg('d', "No se pudo actualizar el grupo.");
        }
        redirect('/src/pages/group-user.php', false);
    } else {
        $session->msg('d', $errors);
        redirect('/src/pages/group-user.php', false);
    }
}
