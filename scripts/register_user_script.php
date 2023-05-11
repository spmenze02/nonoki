
<?php

require_once('createTable.php');
$upOne = dirname(__DIR__, 1);
$db_user = 'root';
$db_pass = '';
$db_name = "bookstore";

$db = new PDO('mysql:host=localhost;dbname='.$db_name.';charset=utf8', $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if (isset($_POST['create'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $student_number = $_POST['student_number'];
    $username = $_POST['username'];
    $password = hash('ripemd160', $_POST['password']);

    $sql = "INSERT INTO tblUser (firstname, lastname, student_number, username, password) VALUES (?,?,?,?,?)";
    $stmtinsert = $db->prepare($sql);
    $results = $stmtinsert->execute([$firstname, $lastname, $student_number, $username, $password]);
    if ($results) {        
        header('Location: ../login_student.php');
    } else {
        header($upOne ."login_student.php");
        echo 'Not Saved';
    }
}
?>