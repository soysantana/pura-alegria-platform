<?php
require_once('../../config/load.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $req_fields = array('activityName', 'activityCategory');
    validate_fields($req_fields);

    if (empty($errors)) {
        $name = $db->escape($_POST['activityName']);
        $category = $db->escape($_POST['activityCategory']);
        $description = $db->escape($_POST['activityDescription']);

        $sql = "INSERT INTO activities (
            name,
            category,
            description
        ) VALUES (
            '{$name}',
            '{$category}',
            '{$description}'
        )";

        if ($db->query($sql)) {
            $session->msg('s', "Actividad agregada exitosamente.");
        } else {
            $session->msg('d', 'Lo siento, la actividad no se pudo agregar.');
        }
        redirect('/src/pages/add-activity.php', false);
    } else {
        $session->msg("d", $errors);
        redirect('/src/pages/add-activity.php', false);
    }
}
