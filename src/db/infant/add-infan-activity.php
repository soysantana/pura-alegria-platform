<?php
require_once('../../config/load.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $req_fields = array('assignInfant', 'assignActivity');
    validate_fields($req_fields);

    if (empty($errors)) {
        $infant = $db->escape($_POST['assignInfant']);
        $caregId = $db->escape($_POST['caregiverId']);
        $activity = $db->escape($_POST['assignActivity']);
        $note = $db->escape($_POST['note']);

        $sql = "INSERT INTO infant_activity_logs (
            infant_id,
            caregiver_id,
            activity_id,
            notes
        ) VALUES (
            '{$infant}',
            '{$caregId}',
            '{$activity}',
            '{$note}'
        )";

        if ($db->query($sql)) {
            $session->msg('s', "Actividad asignada correctamente al infante.");
        } else {
            $session->msg('d', 'No se pudo asignar la actividad al infante. Por favor, inténtalo nuevamente.');
        }
        redirect('/src/pages/activity.php', false);
    } else {
        $session->msg("d", $errors);
        redirect('/src/pages/activity.php', false);
    }
}
