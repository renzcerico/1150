<?php
    //database connection details.
    $host = 'localhost';
    $db_name = '1150';
    $db_username = 'root';
    $db_password = '';

    try
    {
        $pdo = new PDO('mysql:host='. $host .';dbname='.$db_name, $db_username, $db_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e)
    {
        exit('Error Connecting To DataBase');
    }
?>