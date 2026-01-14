<?php
require_once('../../config/load.php');
page_require_level(1);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $req_fields = array('caregiver', 'infant');
    validate_fields($req_fields);

    if (empty($errors)) {
        $id = (int) base64_decode($_POST['assignId']);
        $caregiver = $db->escape($_POST['caregiver']);
        $infant = $db->escape($_POST['infant']);

        $sql = "UPDATE infant_caregivers SET infant_id='{$infant}', caregiver_id='{$caregiver}' WHERE id='{$id}'";
        $result = $db->query($sql);

        if ($result && $db->affected_rows() === 1) {
            $session->msg('s', "Asignación actualizada correctamente.");
        } else {
            $session->msg('d', "No se pudo actualizar la asignación.");
        }
        redirect('/home', false);
    } else {
        $session->msg('d', $errors);
        redirect('/home', false);
    }
}
