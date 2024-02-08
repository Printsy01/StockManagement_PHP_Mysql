<?php
$host="localhost";
$user="postgres";
$pass="root";
$db="gestion_com";

    try {
        $pdo = new PDO("pgsql: host =$host; port=5433; dbname = $db" , $user , $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    } catch (PDOException $e) {
        (var_dump($e));
        
    }
?>