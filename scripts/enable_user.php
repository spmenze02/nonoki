<?php
    require_once('dbConn.php');
    
    try {
        $username = $_POST["username"];        
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Error Handling
        $sql = "UPDATE tblUser SET
            enabled ='true' WHERE username = '".$username."';";
        $stmtinsert = $db->prepare($sql)->execute();
        $db->exec($sql);
    } catch (\Throwable $th) {
        echo $th;
    }
    header("Location: ../manage_students.php");
?>