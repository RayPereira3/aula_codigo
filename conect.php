<?php
 $host = 'localhost';
 $dbname = 'aula_ilderlandio';
 $user = 'root';
 $password = 'mysql2024';

 try{
     $conect = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
     $conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //  echo "<p>Connected to MySQL successfully!</p>";
    
 } catch (PDOException $e) {
     die("Connection failed:".$e->getMessage());
 }