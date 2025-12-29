<?php
require_once('../../config/load.php');
page_require_level(1);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $req_fields = array('productName', 'productType');
    validate_fields($req_fields);

    if (empty($errors)) {
        $id = (int) base64_decode($_GET['id']);
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
            $query = "SELECT picture FROM products WHERE id='{$id}' LIMIT 1";
            $resultOld = $db->query($query);
            if ($resultOld && $db->num_rows($resultOld) === 1) {
                $oldData = $db->fetch_assoc($resultOld);
                $oldPicture = $oldData['picture'];
                if (!empty($oldPicture)) {
                    $oldPath = realpath(__DIR__ . '/../../uploads/' . $oldPicture);
                    if ($oldPath && file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }
            }
            $uploadResult = upload_image($_FILES['picture'], 'product');
            if (isset($uploadResult['error'])) {
                $session->msg('d', $uploadResult['error']);
                redirect('/products-edit?id=' . base64_encode($id), false);
            }
            $picture = $uploadResult['fileName'];
        }

        $sql = "UPDATE products SET name ='{$name}', category ='{$category}',
                brand ='{$brand}', type_product ='{$type}', unit_measurement ='{$unitMeasurement}',
                quantity_product ='{$amount}', price ='{$price}', minimum_quantity ='{$minimumQuantity}',
                location ='{$location}', status ='{$status}', expiration_date ={$expirationDate},
                observations ='{$observations}'";

        if ($picture !== null) {
            $sql .= ", picture = '{$picture}'";
        }
        $sql .= " WHERE id='{$id}'";

        $result = $db->query($sql);
        if ($result && $db->affected_rows() === 1) {
            $session->msg('s', "Hola el producto . {$name} . ha sido actualizada.");
            redirect('/products', false);
        } else {
            $session->msg('d', " Lo siento tu actualización falló.");
            redirect('/products-edit?id=' . base64_encode($id), false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('/products', false);
    }
}
