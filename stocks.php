<?php
session_start();
try{
   require_once 'utility/ensure_logged_in.php';
   require_once 'Models/database.php';
   require_once 'Models/stocks.php';  
   
   
     $action = htmlspecialchars(filter_input(INPUT_POST, "action"));
     
     $symbol = htmlspecialchars(filter_input(INPUT_POST, "symbol"));
     $name = htmlspecialchars(filter_input(INPUT_POST, "name"));
     $current_price = filter_input(INPUT_POST, "current_price",FILTER_VALIDATE_FLOAT);
     
  if( $action == "insert_or_update" && $symbol != "" && $name != "" && $current_price != 0 ){
      $insert_or_update = filter_input(INPUT_POST, 'insert_or_update');
      
      if($insert_or_update == "insert"){
             
      insert_stock($symbol, $name, $current_price);
      }
      else if($insert_or_update == "update"){
      update_stock($symbol, $name, $current_price);
      }
      header("Location: stocks.php");
      
  }

   else if($action == "delete" && $symbol != ""){
           delete_stock($symbol);
          header("Location: stocks.php");
         }
    else if($action != ""){
        $error_message = "Error, Please try again";
        include('views/error.php');
    }
        
    
    $stocks = list_stocks();
            
     include('views/stocks.php');

 } catch (Exception $e) {
         $error_message = $e->getMessage();
include('views/error.php'); 
 }
         
?>

