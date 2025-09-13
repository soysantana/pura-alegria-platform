<?php
require_once('../../config/load.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $req_fields = array('firstName', 'infanteTutor');
    validate_fields($req_fields);

    if (empty($errors)) {
        $name = $db->escape($_POST['firstName']);
        $lastName = $db->escape($_POST['lastName']);
        $birthDate = $db->escape($_POST['birthDate']);
        $gender = $db->escape($_POST['gender']);
        $tutor = $db->escape($_POST['infanteTutor']);
        $picture = null;
        if (isset($_FILES['picture']) && $_FILES['picture']['error'] !== UPLOAD_ERR_NO_FILE) {
            $uploadResult = upload_image($_FILES['picture'], 'infant');
            if (isset($uploadResult['error'])) {
                $session->msg('d', $uploadResult['error']);
                redirect('/src/pages/infant.php', false);
            }
            $picture = $db->escape($uploadResult['fileName']);
        }

        $sql = "INSERT INTO infants (
            first_name,
            last_name,
            birth_date,
            gender,
            tutor_id,
            picture
        ) VALUES (
            '{$name}',
            '{$lastName}',
            '{$birthDate}',
            '{$gender}',
            '{$tutor}',
            '{$picture}'
        )";

        if ($db->query($sql)) {
            $session->msg('s', "El infante <strong>" . htmlentities($_POST['firstName']) . "</strong> ha sido registrado exitosamente.");
        } else {
            $session->msg('d', 'No se pudo registrar el infante. Por favor, inténtalo nuevamente.');
        }
        redirect('/src/pages/infant.php', false);
    } else {
        $session->msg("d", $errors);
        redirect('/src/pages/infant.php', false);
    }
}
