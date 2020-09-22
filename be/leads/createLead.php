<?php
require_once('../config.php');
require_once('../database.php');
require_once('../response.php');

try {
    if(isset($_POST['full_name']) && isset($_POST['email']) 
        && $_POST['full_name'] != '' && $_POST['email'] != '') {
            $db = new database($pdo);
            $res = $db->createLead($_POST);
            echo $res;
    } else {
        $response = new response();
        $response->error(['message' => 'Missing required information']);
    }

} catch(Exception $e) {
    die($e->getMessage());
}

