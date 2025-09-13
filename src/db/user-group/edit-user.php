<?php
require_once('../../config/load.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $req_fields = array('userLevel', 'statusUser');
    validate_fields($req_fields);

    var_dump($_POST);

    if (empty($errors)) {
        $id = (int)$_POST['userId'];
        $level = $db->escape($_POST['userLevel']);
        $status = $db->escape($_POST['statusUser']);

        $sql = "UPDATE users SET user_level='{$level}', status='{$status}'";

        if (!empty($_POST['pswUser'])) {
            $psw = password_hash($_POST['pswUser'], PASSWORD_BCRYPT);
            $sql .= ", password='{$psw}'";
        }

        $sql .= " WHERE id='{$id}'";

        $result = $db->query($sql);

        if ($result && $db->affected_rows() === 1) {
            $session->msg('s', "Usuario actualizada correctamente.");
        } else {
            $session->msg('d', "No se pudo actualizar el usuario.");
        }
        redirect('/src/pages/user.php', false);
    } else {
        $session->msg('d', $errors);
        redirect('/src/pages/user.php', false);
    }
}
