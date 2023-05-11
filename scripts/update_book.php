<?php
    session_start();

    $db_user = 'root';
    $db_pass = '';
    $db_name = "bookstore";

    $db = new PDO('mysql:host=localhost;dbname='.$db_name.';charset=utf8', $db_user, $db_pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    require_once('DBConn.php');
    $isbn = trim($_POST['isbn']);
    $title = trim($_POST['title']);
    $author = trim($_POST['author']);        
    $edition = trim($_POST['edition']);
    $reg_date = trim($_POST['reg_date']);
    $year = trim($_POST['year']);
    $price = trim($_POST['price']);
    $quantity = trim($_POST['quantity']);
    $username = trim($_SESSION['username']);

        try {
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Error Handling
            $sql = "UPDATE tblBooks SET title = '".$title."', author = '".$author."', edition = '".$edition."', year = '".$year."', price = '".$price ."', quantity = '".$quantity."', username = '".$username."', reg_date = '".$reg_date."' WHERE isbn ='".$isbn."';";            
            $stmtinsert = $db->prepare($sql)->execute();
            $db->exec($sql);
            

          
        } catch (\Throwable $th) {
            echo $th;
        }
    header("Location: ../dashboard_admin_staff.php");
?>