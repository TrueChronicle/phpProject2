<?php
 $data_source_name = 'mysql:host=localhost;dbname=stock';
 $username = 'stockuser';
 $password = 'test123';
 
 try {
     $database = new PDO($data_source_name, $username, $password);
     echo"<p>Database connection was successful!!!</p>";
 } catch (Exception $e) {
         $error_message = $e->getMessage();
 echo "<p> Error Message: $error_message </p>";
 }
         
?>