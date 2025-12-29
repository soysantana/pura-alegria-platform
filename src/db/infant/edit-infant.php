<?php
require_once('../../config/load.php');
page_require_level(1);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $req_fields = array('firstName', 'infanteTutor');
    validate_fields($req_fields);

    if (empty($errors)) {
        $id = (int)$_POST['infantId'];
        $fName = remove_junk($db->escape($_POST['firstName']));
        $lName = remove_junk($db->escape($_POST['lastName']));
        $date = remove_junk($db->escape($_POST['birthDate']));
        $gender = remove_junk($db->escape($_POST['gender']));
        $tutor = remove_junk($db->escape($_POST['infanteTutor']));
        $picture = null;

        if (isset($_FILES['picture']) && $_FILES['picture']['error'] !== UPLOAD_ERR_NO_FILE) {
            // Obtener la foto anterior del usuario
            $query = "SELECT picture FROM infants WHERE id='{$id}' LIMIT 1";
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
            $uploadResult = upload_image($_FILES['picture'], 'infant');
            if (isset($uploadResult['error'])) {
                $session->msg('d', $uploadResult['error']);
                redirect('/infant', false);
            }
            $picture = $uploadResult['fileName'];
        }

        $sql = "UPDATE infants SET first_name ='{$fName}', last_name ='{$lName}',
                birth_date ='{$date}', gender ='{$gender}', tutor_id ='{$tutor}'";

        if ($picture !== null) {
            $sql .= ", picture = '{$picture}'";
        }
        $sql .= " WHERE id='{$id}'";

        $result = $db->query($sql);
        if ($result && $db->affected_rows() === 1) {
            $session->msg('s', "Hola el infante ha sido actualizada.");
            redirect('/infant', false);
        } else {
            $session->msg('d', " Lo siento tu actualización falló.");
            redirect('/infant', false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('/infant', false);
    }
}
