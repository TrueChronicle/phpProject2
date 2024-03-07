<?php

session_start();

try{
   require_once 'Models/database.php';
   require_once 'Models/login.php';
   
   $message = "";
   
$email_address = htmlspecialchars(filter_input(INPUT_POST, "email_address"));
$password = htmlspecialchars(filter_input(INPUT_POST, "password"));
$password_hash = password_hash($password, PASSWORD_DEFAULT);
$action = htmlspecialchars(filter_input(INPUT_GET, "action"));

if( $action == "logout"){
    $_SESSION = array();
    session_destroy();
}

if ($email_address != "" && $password != ""){
    if(login($email_address, $password)){
      $_SESSION['is_logged_in'] = true;  
    }   else{
        $message = "login failed, please try again";
    }
}



$is_logged_in = login($email_address, $password);

include('views/login.php');

} catch (Exception $e) {
  $error_message = $e->getMessage();
include('views/error.php'); 
 }

   

