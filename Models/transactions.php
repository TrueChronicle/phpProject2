<?php
   
    
function list_transactions(){
     global $database;
    $query = 'SELECT user_id, stock_id, quantity, price, timestamp, id FROM transactions';
     
     $statement = $database->prepare($query);
     
     $statement->execute();
     
     $transactions = $statement->fetchAll();
     
     $statement->closeCursor();
     
     return $transactions;
}

function insert_transaction($user_id, $stock_id, $quantity, $price, $id){
     global $database;
    $query = "INSERT INTO transaction( user_id, stock_id, quantity, price, timestamp, id)"
                 . "VALUES (:user_id, :stock_id, :quantity, :price )";
         
         $statement = $database->prepare($query);
         $statement ->bindValue(":user_id", $user_id);
         $statement ->bindValue(":stock_id", $stock_id);
         $statement ->bindValue(":quantity", $quantity);
         $statement ->bindValue(":price", $price);
         $statement ->bindValue(":id", $id);
         $statement->execute();
         $statement->closeCursor();
        }
        
 function update_transaction($user_id, $stock_id, $quantity, $price, $id){
      global $database;
      $query = "update transaction set user_id = :user_id, "
              . "stock_id = :stock_id"
                . "quantity = :quantity,"
                . "price = :price"
                 . " where id = :id";
         $statement = $database->prepare($query);
         $statement ->bindValue(":user_id", $user_id);
         $statement ->bindValue(":stock_id", $stock_id);
         $statement ->bindValue(":quantity", $quantity);
         $statement ->bindValue(":price", $price);
         $statement ->bindValue(":id", $id);
         
         $statement->execute();
         
         $statement->closeCursor();
         
 }
 
 function delete_transaction($id){
      global $database;
           $query = "Delete from transaction"
              . " where id = :id";
             
              $statement = $database->prepare($query);
              $statement ->bindValue(":id", $id);
              $statement->execute();
              $statement->closeCursor();
         
 }

