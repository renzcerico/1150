<?php
require_once('../config.php');
require_once('../database.php');
require_once('../response.php');

try {
    if(isset($_POST['email'])) {
            $db = new database($pdo);
            $res = $db->newsletterSubscribe($_POST['email']);
            echo $res;
    } else {
        $response = new response();
        $response->error(['message' => 'Missing required information']);
    }

} catch(Exception $e) {
    die($e->getMessage());
}

