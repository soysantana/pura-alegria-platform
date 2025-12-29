<?php
require_once('../../config/load.php');
page_require_level(3);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit;
}

if (!isset($_POST['notifyId'], $_SESSION['user_id'])) {
    http_response_code(400);
    exit;
}

$notifyId = (int) base64_decode($db->escape($_POST['notifyId']));
$user_id  = (int) $_SESSION['user_id'];

$sql = "UPDATE notifications SET is_read=1 WHERE id={$notifyId} AND user_id={$user_id}";

$db->query($sql);

exit;
