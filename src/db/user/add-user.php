<?php
require_once('../../config/load.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $req_fields = array('fName', 'username', 'password');
    validate_fields($req_fields);

    if (empty($errors)) {
        $name = $db->escape($_POST['fName']);
        $lName = $db->escape($_POST['lName']);
        $user = $db->escape($_POST['username']);
        $psw = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $sql = "INSERT INTO users (
            first_name,
            last_name,
            username,
            password
        ) VALUES (
            '{$name}',
            '{$lName}',
            '{$user}',
            '{$psw}'
        )";

        if ($db->query($sql)) {
            $session->msg('s', "El usuario <strong>" . htmlentities($_POST['username']) . "</strong> ha sido registrado y está pendiente de validación por el administrador.");
            redirect('/src/pages/signin.php', false);
        } else {
            $session->msg('d', 'No se pudo registrar el usuario. Por favor, verifica los datos e inténtalo nuevamente.');
            redirect('/src/pages/signup.php', false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('/src/pages/signup.php', false);
    }
}
