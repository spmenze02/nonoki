<?php

require_once('dbConn.php');

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Error Handling
    $sql = "INSERT INTO tblUserCart(
        username,
        books_ids)
        VALUES (?,?)";

    $stmtinsert = $db->prepare($sql);
    $results = $stmtinsert->execute([$_POST['username'], $_POST['ids']]);
    if ($results) {        
        echo 'Saved';
    } else {
        // header($upOne ."login_student.php");
        echo 'Not Saved';
    }
?>