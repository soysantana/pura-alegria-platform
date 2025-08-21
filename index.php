<?php
ob_start();
require_once('src/config/load.php');
if ($session->isUserLoggedIn(true)) {
    redirect('src/pages/signin.php', false);
}
