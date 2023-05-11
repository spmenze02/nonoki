<?php
session_start();
require_once('createTable.php');

$student_number = $_POST['student_number'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM tbluser WHERE username = '" . $username . "';";
$results = $db->query($sql);

try {
     $rows = $results->fetchAll(PDO::FETCH_ASSOC);

     if ($rows) {
          foreach ($rows as $rows) {
               // if ($rows['password'] === $password) {

               $tempHash = hash('ripemd160', $_POST['password']);

               if ($rows['password'] === $tempHash) {

                    $_SESSION["username"] = $rows["username"];
                    $_SESSION["firstname"] = $rows["firstname"];
                    $_SESSION["lastname"] = $rows["lastname"];
                    $_SESSION["student_number"] = $rows["student_number"];
                    $_SESSION["reg_date"] = $rows["reg_date"];
                    
                    $result = $db->query("SELECT * FROM tblAdmin WHERE username = '" . $username . "';");
                    // Display
                    if (!$result){
                         header('lOCATION: ../index.php');
                    
                    }else {
                         header('lOCATION: ../dashboard_admin_staff.php');
                    }

                    
               } else {
                    echo "passwords dont match";
               }
          }
     }
} catch (\Throwable $th) {
     echo $th;
}
?>