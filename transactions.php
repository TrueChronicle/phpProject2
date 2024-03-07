<?php
session_start();
try{
   require_once 'Models/database.php';
   require_once 'Models/transactions.php';  
   require_once 'Models/users.php';
   require_once 'Models/stocks.php';  
   
   
     $action = htmlspecialchars(filter_input(INPUT_POST, "action"));
     $id = htmlspecialchars(filter_input(INPUT_POST, "id", FILTER_VALIDATE_FLOAT));
     
     $user_id = htmlspecialchars(filter_input(INPUT_POST, "user_id", FILTER_VALIDATE_INT));
     $stock_id = htmlspecialchars(filter_input(INPUT_POST, "stock_id", FILTER_VALIDATE_FLOAT));
     $quantity = filter_input(INPUT_POST, "quantity",FILTER_VALIDATE_FLOAT);
     $price = filter_input(INPUT_POST, "price",FILTER_VALIDATE_FLOAT);
     
 if($action == "insert" && $user_id != "0" && $stock_id != 0 && $quantity != 0 ){
           
          $users = list_users();
          $user_name = "";
          $user_email_address = "";
           $users_cash_balance = 0;  
           foreach($users as $user) {
               if ($user['id'] == $user_id){
                   $user_name = $users['name'];
                   $user_email_address = $user['email_address'];
                   $users_cash_balance = $user['cash_balance'];
               }
           }
          
           $stocks = list_stocks();
            $stock_price =0;
            foreach ($stocks as $stock) {
                if ($stock['id'] == $stock_id){
                    $stock_price = $stock['price'];
                }
            }
          
            $total_cost = $stock_price * $quantity;
            
            if ($users_cash_balance >= $total_cost){
                insert_transaction($user_id, $stock_id, $quantity, $stock_price);
                $new_balance = $users_cash_balance - $total_cost;
                update_user($user_name, $email_address, $new_balance);
            }
             else{ 
        $error_message = "Insufficient funds";
        include('views/error.php');
                    
                }
    
      header("Location: transactions.php");
      
  }
  
        
    else if($action == "update" && $user_id != "0" && $stock_id != 0 && $quantity != 0 && $price != 0 && $id != 0){
      update_transaction($user_id, $stock_id, $quantity, $price, $id);
      }
   else if($action == "delete" && $id != 0){
      delete_transaction($id);
      header("Location: transactions.php");
         }
    else if($action != ""){
        $error_message = "Error, Please try again";
        include('views/error.php');
    }
        
    
    $transactions = list_transactions();
            
    include('views/transactions.php');

 } catch (Exception $e) {
         $error_message = $e->getMessage();
include('views/error.php'); 
 }
         
?>
