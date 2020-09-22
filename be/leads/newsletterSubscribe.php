<?php
require_once('../config.php');
require_once('../database.php');

try {
    if(isset($_POST['email'])) {
            $db = new database($pdo);
            $res = $db->newsletterSubscribe($_POST['email']);
            echo json_encode($res);
    } else {
        die('missing required information');
    }

} catch(Exception $e) {
    die($e->getMessage());
}

