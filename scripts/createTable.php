<?php
require_once('DBConn.php');
$table = "tblUser";
$upOne = dirname(__DIR__, 1);
$csvFile = file($upOne . '/data/userData.txt');
$data = [];

try {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE IF NOT EXISTS tblUser(
        username VARCHAR(50),
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        student_number VARCHAR(50),
        password VARCHAR(50),
        enabled varchar(255) DEFAULT 'false',
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY  (username)
        );";
    $db->exec($sql);

    $sql = "CREATE TABLE IF NOT EXISTS tblAdmin(
        username VARCHAR(50),
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,        
        password VARCHAR(50),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY  (username)
        );";
    $db->exec($sql);

    $sql = "CREATE TABLE IF NOT EXISTS tblBooks(
        isbn VARCHAR(100),
        title VARCHAR(100) NOT NULL,
        author VARCHAR(100) NOT NULL,
        edition VARCHAR(100) NOT NULL,
        year DATE NOT NULL,
        price FLOAT(255,2),        
        quantity INT(255),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY  (isbn),
        username VARCHAR(50) NOT NULL,
        CONSTRAINT FK_Username FOREIGN KEY (username)
        REFERENCES tblUser(username)
        );";
    $db->exec($sql);
    
    $sql = "CREATE TABLE IF NOT EXISTS tblAorder(
        id int AUTO_INCREMENT,
        username VARCHAR(50),
        books_ids VARCHAR(1000) NOT NULL,       
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY  (id),
        CONSTRAINT FK_UsernameCart FOREIGN KEY (username)
        REFERENCES tblUser(username)
        );";
    $db->exec($sql);

    $sql = "CREATE TABLE IF NOT EXISTS tblMessages(
        id int AUTO_INCREMENT NOT NULL,
        sender_id VARCHAR(50) NOT NULL,        
        title VARCHAR(100) NOT NULL,
        body VARCHAR(1000) NOT NULL,    
        time_sent TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        time_received DATETIME,
        message_read BOOLEAN,
        responder_id varchar(255),
        PRIMARY KEY  (id),
        CONSTRAINT FK_sender_id FOREIGN KEY (sender_id)
        REFERENCES tblUser(username)        
        );";
    $db->exec($sql);

    $csvFileRead = fopen($upOne . '/data/userData.txt', 'r');

    while (($getData = fgetcsv($csvFileRead, 10000, ";", " "," ")) !== false) {

        $username = $getData[0];
        $firstname = $getData[1];
        $lastname = $getData[2];
        $student_number = $getData[3];
        $password = hash('ripemd160', $getData[4]);
        $reg_date = $getData[5];

        $query = "SELECT username FROM tblUser WHERE username = '" . $getData[0] . "'";

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Error Handling
        $sql = "INSERT INTO tblUser(
        username,
        firstname,
        lastname,
        student_number,
        password,
        reg_date) VALUES('" .$username . "','" .$firstname . "','" .$lastname . "','" .$student_number . "','" .$password . "','" .$reg_date . "');";
        $db->exec($sql);
    }
     
     fclose($csvFileRead);

     $csvFileRead = fopen($upOne . '/data/adminData.txt', 'r');

    while (($getData = fgetcsv($csvFileRead, 10000, ";", " "," ")) !== false) {

        $username = $getData[0];
        $firstname = $getData[1];
        $lastname = $getData[2];        
        $password = hash('ripemd160', $getData[3]);
        $reg_date = $getData[4];

        $query = "SELECT username FROM tblUser WHERE username = '" . $getData[0] . "'";

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Error Handling
        $sql = "INSERT INTO tblAdmin(
        username,
        firstname,
        lastname,   
        password,
        reg_date) VALUES('" .$username . "','" .$firstname . "','" .$lastname . "','" .$password . "','" .$reg_date . "');";
        $db->exec($sql);
    }
     
     fclose($csvFileRead);
     
     $csvFileRead = fopen($upOne . '/data/booksData.txt', 'r');

    while (($getData = fgetcsv($csvFileRead, 10000, ";", " "," ")) !== false) {

        
        $isbn = $getData[0];
        $title = $getData[1];
        $author = $getData[2];        
        $edition = $getData[3];
        $year = $getData[4];
        $price = $getData[5];
        $quantity = $getData[6];        
        $reg_date = $getData[7];
        $username = $getData[8];
        
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Error Handling
        $sql = "INSERT INTO tblBooks(
        isbn,
        title,
        author,   
        edition,
        year,
        price,
        quantity,
        reg_date,
        username) 
        VALUES('" .$isbn . "','" .$title . "','" .$author . "','" .$edition . "','" .$year . "','" .$price . "','" .$quantity . "','" .$reg_date . "','" .$username . "');";
        $db->exec($sql);
    }
     
     fclose($csvFileRead);

} catch (PDOException $e) {
    header($upOne ."login_student.php");
}


?>