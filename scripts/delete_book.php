<?php
session_start();
//require_once('DBConn.php');
$db_user = 'root';
$db_pass = '';
$db_name = "bookstore";
$table = "tblbooks";
$isbn= $_POST['isbn'];


    try {

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Error Handling
        $sql = "DELETE FROM tblbooks WHERE isbn = '".$isbn ."';";        
        $stmtinsert = $db->prepare($sql)->execute();
        $db->exec($sql);
    
    } catch (\Throwable $th) {
        echo $th;
    }    
    header('Location: ../dashboard_admin_staff.php');
?>
