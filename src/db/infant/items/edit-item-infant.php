<?php
require_once('../../../config/load.php');
page_require_level(2);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $req_fields = array();
    validate_fields($req_fields);

    if (empty($errors) && isset($_POST['itemName'])) {

        $total_actualizados = 0;

        foreach ($_POST['itemName'] as $index => $name) {

            $id = (int) base64_decode($db->escape($_POST['itemId'][$index]));
            $name = remove_junk($db->escape($name));
            $quantity = remove_junk($db->escape($_POST['itemQuantity'][$index]));
            $unit = remove_junk($db->escape($_POST['itemUnit'][$index]));

            $sql = "UPDATE item_infants 
                    SET name='{$name}', quantity='{$quantity}', unit_measurement='{$unit}' 
                    WHERE id='{$id}'";

            $db->query($sql);

            // <-- Aquí verificamos si realmente se actualizó algo
            if ($db->affected_rows() > 0) {
                $total_actualizados++;
            }
        }

        if ($total_actualizados > 0) {
            $session->msg("s", "Se actualizaron {$total_actualizados} artículos.");
        } else {
            $session->msg("d", "Lo siento, no se actualizó ningún artículo.");
        }

        redirect('/item-infant', false);
    } else {

        $session->msg("d", $errors);
        redirect('/item-infant', false);
    }
}
