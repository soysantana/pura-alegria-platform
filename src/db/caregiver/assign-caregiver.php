<?php
require_once('../../config/load.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $req_fields = array('caregiver', 'infant');
    validate_fields($req_fields);

    if (empty($errors)) {
        $caregiver = $db->escape($_POST['caregiver']);
        $infant = $db->escape($_POST['infant']);

        $sql = "INSERT INTO infant_caregivers (
            infant_id,
            caregiver_id
        ) VALUES (
            '{$infant}',
            '{$caregiver}'
        )";

        if ($db->query($sql)) {
            $session->msg('s', "Cuidadora asignada correctamente.");
        } else {
            $session->msg('d', 'No se pudo asignar la cuidadora. Por favor, inténtalo nuevamente.');
        }
        redirect('/home', false);
    } else {
        $session->msg("d", $errors);
        redirect('/home', false);
    }
}
