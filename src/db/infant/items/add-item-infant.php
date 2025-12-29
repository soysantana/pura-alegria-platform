<?php
require_once('../../../config/load.php');
page_require_level(2);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $req_fields = array();
    validate_fields($req_fields);

    if (empty($errors)) {
        list($infantId, $tutorId) = explode(',', $_POST['infant']);
        $infantId = $db->escape($infantId);
        $tutorId  = $db->escape($tutorId);
        $userId = $_SESSION['user_id'];
        $items = $_POST['items'] ?? [];

        foreach ($items as $i) {
            $name  = $db->escape($i['name']);
            $unit  = $db->escape($i['unit']);
            $quantity  = $db->escape($i['quantity']);


            $sql = "INSERT INTO item_infants (
            name,
            unit_measurement,
            quantity,
            infant_id,
            tutor_id,
            caregiver_id
        ) VALUES (
            '{$name}',
            '{$unit}',
            '{$quantity}',
            '{$infantId}',
            '{$tutorId}',
            '{$userId}'
        )";

            $db->query($sql);
        }

        $session->msg('s', "Artículos agregados correctamente al inventario del infante.");
        redirect('/item-infant-add', false);
    } else {
        $session->msg('d', 'No se pudo agregar el artículo al inventario del infante. Por favor, inténtalo nuevamente.', $errors);
        redirect('/item-infant-add', false);
    }
}
