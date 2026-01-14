<?php
require_once('../../config/load.php');
page_require_level(2);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $req_fields = array('assignInfant', 'assignActivity');
    validate_fields($req_fields);

    if (empty($errors)) {
        $id = (int) base64_decode($_POST['activityId']);
        $caregId = (int) base64_decode($_POST['caregiverId']);
        $infant = $db->escape($_POST['assignInfant']);
        $activity = $db->escape($_POST['assignActivity']);

        $sql = "UPDATE infant_activity_logs SET infant_id='{$infant}', caregiver_id='{$caregId}', activity_id='{$activity}' WHERE id='{$id}'";
        $result = $db->query($sql);

        if ($result && $db->affected_rows() === 1) {
            $session->msg('s', "Asignación actualizada correctamente.");
        } else {
            $session->msg('d', "No se pudo actualizar la asignación.");
        }
        redirect('/activity', false);
    } else {
        $session->msg('d', $errors);
        redirect('/activity', false);
    }
}
