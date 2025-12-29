<?php
require_once('../../config/load.php');
page_require_level(1);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $req_fields = array('tutorId', 'infantId', 'serviceType', 'tandaType');
    validate_fields($req_fields);

    if (empty($errors)) {
        $receipt_no = get_receipt_no();
        $tutor_id = $db->escape($_POST['tutorId']);
        $infant_id = $db->escape($_POST['infantId']);
        $service_type = $db->escape($_POST['serviceType']);
        $tanda_type = $db->escape($_POST['tandaType']);
        $days_week = $db->escape($_POST['dayWeek']);
        $start_time = date("H:i:s", strtotime($_POST['startTime']));
        $end_time = date("H:i:s", strtotime($_POST['endTime']));
        $total_hours = $db->escape($_POST['totalHours']);
        $observations = $db->escape($_POST['observations']);
        $discount = $db->escape($_POST['discount']);
        $invoice_date = date('Y-m-d');
        $pdfBase64 = $_POST['pdfBase64'] ?? '';
        $invoicePDF = upload_pdf_base64($pdfBase64, $receipt_no, 'invoice');
        $invoicePath = $db->escape($invoicePDF['fileName']);
        $products = $_POST['products'] ?? [];

        foreach ($products as $p) {
            $subtotal  = $db->escape($p['subtotal']);
            $sub_total += $subtotal;
        }
        $subtotal_total = $sub_total;
        $total = $subtotal_total - ($subtotal_total * ($discount / 100));

        $sql = "INSERT INTO invoices (
            receipt_no,
            tutor_id,
            infant_id,
            service_type,
            tanda_type,
            days_week,
            start_time,
            end_time,
            total_hours,
            observations,
            discount,
            sub_total,
            total,
            invoice_date,
            invoice_pdf
        ) VALUES (
            '{$receipt_no}',
            '{$tutor_id}',
            '{$infant_id}',
            '{$service_type}',
            '{$tanda_type}',
            '{$days_week}',
            '{$start_time}',
            '{$end_time}',
            '{$total_hours}',
            '{$observations}',
            '{$discount}',
            '{$subtotal_total}',
            '{$total}',
            '{$invoice_date}',
            '{$invoicePath}'
        )";

        if ($db->query($sql)) {
            $invoice_id = $db->insert_id();

            foreach ($products as $p) {
                $description = $db->escape($p['description']);
                $quantity    = $db->escape($p['quantity']);
                $price       = $db->escape($p['price']);
                $subtotal    = $db->escape($p['subtotal']);

                $sql2 = "INSERT INTO invoice_details (
                    invoice_id, 
                    payment_type, 
                    price, 
                    quantity,
                    sub_total
                ) VALUES (
                    '{$invoice_id}',
                    '{$description}',
                    '{$price}',
                    '{$quantity}',
                    '{$subtotal}'
                )";

                $db->query($sql2);
            }
            $session->msg('s', "La factura ha sido registrada exitosamente.");
        } else {
            $session->msg('d', 'No se pudo registrar la factura. Por favor, inténtalo nuevamente.');
        }
        redirect('/invoice-add', false);
    } else {
        $session->msg("d", $errors);
        redirect('/invoice-add', false);
    }
}
