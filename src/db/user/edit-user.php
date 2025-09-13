<?php
require_once('../../config/load.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $req_fields = array('firstName', 'lastName');
    validate_fields($req_fields);
    if (empty($errors)) {
        $id = $_SESSION['user_id'];
        $firstName = remove_junk($db->escape($_POST['firstName']));
        $lastName = remove_junk($db->escape($_POST['lastName']));
        $email = remove_junk($db->escape($_POST['email']));
        $phone = remove_junk($db->escape($_POST['phone']));
        $picture = null;
        if (isset($_FILES['picture']) && $_FILES['picture']['error'] !== UPLOAD_ERR_NO_FILE) {
            // Obtener la foto anterior del usuario
            $query = "SELECT picture FROM users WHERE id='{$id}' LIMIT 1";
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
            $uploadResult = upload_image($_FILES['picture'], 'user');
            if (isset($uploadResult['error'])) {
                $session->msg('d', $uploadResult['error']);
                redirect('../../pages/profile.php', false);
            }
            $picture = $uploadResult['fileName'];
        }
        $sql = "UPDATE users SET first_name ='{$firstName}', last_name ='{$lastName}',
                phone ='{$phone}', email ='{$email}'";

        if ($picture !== null) {
            $sql .= ", picture = '{$picture}'";
        }

        $sql .= " WHERE id='{$id}'";
        $result = $db->query($sql);
        if ($result && $db->affected_rows() === 1) {
            $session->msg('s', "Hola " . htmlentities($firstName) . ", tu cuenta ha sido actualizada.");
            redirect('../../pages/profile.php', false);
        } else {
            $session->msg('d', " Lo siento " . htmlentities($firstName) . ", tu actualización falló.");
            redirect('../../pages/profile.php', false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('../../pages/profile.php', false);
    }
}
