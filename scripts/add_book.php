<?php
    session_start();

    $db_user = 'root';
    $db_pass = '';
    $db_name = "bookstore";

    $db = new PDO('mysql:host=localhost;dbname='.$db_name.';charset=utf8', $db_user, $db_pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    require_once('DBConn.php');
    if (isset($_POST['add_book'])) {
    $isbn = $_POST['isbn'];
    $title = $_POST['title'];
    $author = $_POST['author'];        
    $edition = $_POST['edition'];
    $year =  $_POST['year'];
    $price = (float)$_POST['price'];
    $quantity = (int)$_POST['quantity'];
    $username = $_SESSION['username'];

        try {
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Error Handling
            $sql = "INSERT INTO tblBooks( isbn, title, author, edition, year, price, quantity, username) VALUES(?,?,?,?,?,?,?,?);"; 
            $stmtinsert = $db->prepare($sql);
            $results = $stmtinsert->execute([$isbn ,$title ,$author,$edition,$year,$price,$quantity, $username]);
            $db->exec($sql);
        } catch (\Throwable $th) {
            
        }
    }
    header("Location: ../dashboard_admin_staff.php");
?>