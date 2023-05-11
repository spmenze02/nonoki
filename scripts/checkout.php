<?php
session_start();
require_once('DBConn.php');
$cart= $_COOKIE['cookie1'];


    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Error Handling
    $sql = "INSERT INTO tblAorder(    
    username,
    books_ids) 
    VALUES('".$_SESSION["username"]."', '" .$cart ."');";
    $db->exec($sql);
    
    header('Location: ../dashboard_students.php');
?>
