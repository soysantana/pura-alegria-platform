<?php
require_once('../../config/load.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_SESSION['user_id'];
    $city = remove_junk($db->escape($_POST['city']));
    $country = remove_junk($db->escape($_POST['country']));
    $address = remove_junk($db->escape($_POST['address']));
    $sql = "UPDATE users SET city='{$city}', country='{$country}', address='{$address}' WHERE id='{$id}'";
    $result = $db->query($sql);
    if ($result && $db->affected_rows() === 1) {
        $session->msg('s', "Dirección actualizada correctamente.");
        redirect('../../pages/profile.php', false);
    } else {
        $session->msg('d', "No se pudo actualizar la dirección.");
        redirect('../../pages/profile.php', false);
    }
    $session->msg("d", $errors);
    redirect('../../pages/profile.php', false);
}
