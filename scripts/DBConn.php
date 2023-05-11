<?php
$db_user = 'root';
$db_pass = '';
$db_name = "bookstore";
$table = "tblUser";

try {
    $db = new PDO('mysql:host=localhost;charset=utf8', $db_user, $db_pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $databases = $db->query('show databases')->fetchAll(PDO::FETCH_COLUMN);
    if (in_array('bookstore', $databases)) {
       
        $sql = "use ".$db_name;
        $db->exec($sql);
    } else {
        //Create DB
        echo ('databese dont exist');
        $db->exec(
            "CREATE DATABASE `$db_name`;"
        );
        $sql = "use ".$db_name;
        $db->exec($sql);
    }

} catch (PDOException $e) {
    echo $e;
}
?>