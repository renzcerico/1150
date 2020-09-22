<?php
require_once('../config.php');
require_once('../database.php');

try {
    $db = new database($pdo);
    $res = $db->getLeads();
    echo json_encode($res);
} catch(Exception $e) {
    die($e->getMessage());
}

