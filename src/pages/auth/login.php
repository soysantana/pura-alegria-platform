<?php
require_once(__DIR__ . '/../../config/load.php');

$req_fields = array('username', 'password');
validate_fields($req_fields);
$username = remove_junk($_POST['username']);
$password = remove_junk($_POST['password']);

if (empty($errors)) {
    $user_id = authenticate($username, $password);
    if ($user_id) {
        //create session with id
        $session->login($user_id);
        //Update Sign in time
        updateLastLogIn($user_id);
        $session->msg("s", "Bienvenido a Pura Alegria.");
        redirect('../pages/home.php', false);
    } else {
        $session->msg("d", "Nombre de usuario y/o contraseña incorrecto.");
        redirect('../signin.php', false);
    }
} else {
    $session->msg("w", $errors);
    redirect('../signin.php', false);
}
