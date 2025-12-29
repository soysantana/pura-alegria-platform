<?php
require_once('../../config/load.php');
page_require_level(1);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $req_fields = array('productName', 'productType');
    validate_fields($req_fields);

    if (empty($errors)) {
        $name = $db->escape($_POST['productName']);
        $category = $db->escape($_POST['productCategory']);
        $brand = $db->escape($_POST['productBrand']);
        $type = $db->escape($_POST['productType']);
        $unitMeasurement = $db->escape($_POST['productUnitMeasurement']);
        $amount = $db->escape($_POST['productAmount']);
        $price = $db->escape($_POST['productPrice']);
        $observations = $db->escape($_POST['Productobservations']);
        $minimumQuantity = $db->escape($_POST['productMinimumQuantity']);
        $expirationDate = !empty($_POST['productExpirationDate']) ? "'" . $db->escape($_POST['productExpirationDate']) . "'" : "NULL";
        $location = $db->escape($_POST['productLocation']);
        $status = $db->escape($_POST['productStatus']);
        $picture = null;
        if (isset($_FILES['picture']) && $_FILES['picture']['error'] !== UPLOAD_ERR_NO_FILE) {
            $uploadResult = upload_image($_FILES['picture'], 'product');
            if (isset($uploadResult['error'])) {
                $session->msg('d', $uploadResult['error']);
                redirect('/products', false);
            }
            $picture = $db->escape($uploadResult['fileName']);
        }

        $sql = "INSERT INTO products (
            name,
            category,
            brand,
            type_product,
            unit_measurement,
            quantity_product,
            price,
            minimum_quantity,
            location,
            status,
            picture,
            expiration_date,
            observations
        ) VALUES (
            '{$name}',
            '{$category}',
            '{$brand}',
            '{$type}',
            '{$unitMeasurement}',
            '{$amount}',
            '{$price}',
            '{$minimumQuantity}',
            '{$location}',
            '{$status}',
            '{$picture}',
             {$expirationDate},
            '{$observations}')";

        if ($db->query($sql)) {
            $session->msg('s', "El producto <strong>" . htmlspecialchars($_POST['productName']) . "</strong> ha sido registrado exitosamente.");
        } else {
            $session->msg('d', 'No se pudo registrar el producto. Por favor, inténtalo nuevamente.');
        }
        redirect('/products-add', false);
    } else {
        $session->msg("d", $errors);
        redirect('/products', false);
    }
}
