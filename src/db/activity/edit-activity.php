<?php
require_once('../../config/load.php');
page_require_level(2);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $req_fields = array('activityName', 'activityCategory');
    validate_fields($req_fields);

    if (empty($errors)) {
        $id = (int)$_POST['activityId'];
        $name = $db->escape($_POST['activityName']);
        $category = $db->escape($_POST['activityCategory']);
        $description = $db->escape($_POST['activityDescription']);

        $sql = "UPDATE activities SET name='{$name}', category='{$category}', description='{$description}' WHERE id='{$id}'";
        $result = $db->query($sql);

        if ($result && $db->affected_rows() === 1) {
            $session->msg('s', "Actividad actualizada correctamente.");
        } else {
            $session->msg('d', "No se pudo actualizar la actividad.");
        }
        redirect('/add-activity', false);
    } else {
        $session->msg('d', $errors);
        redirect('/add-activity', false);
    }
}
