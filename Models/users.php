<?php
   
    
function list_users(){
     global $database;
    $query = 'SELECT name, email_address, cash_balance, id FROM users';
     
     $statement = $database->prepare($query);
     
     $statement->execute();
     
     $users = $statement->fetchAll();
     
     $statement->closeCursor();
     
     return $users;
}

function insert_users($name, $email_address, $cash_balance){
     global $database;
    $query = "INSERT INTO users ( name, email_address, cash_balance)"
                 . "VALUES (:name, :email_address, :cash_balance)";
         
         $statement = $database->prepare($query);
         $statement ->bindValue(":name", $name);
         $statement ->bindValue(":email_address", $email_address);
         $statement ->bindValue(":cash_balance", $cash_balance);
         $statement->execute();
         $statement->closeCursor();
        }
        
 function update_users($name, $email_address, $cash_balance) {
      global $database;
      $query = "update users set name = :name, cash_balance = :cash_balance"
                 . " where  email_address = :email_address";
         $statement = $database->prepare($query);
         $statement ->bindValue(":name", $name);
         $statement ->bindValue(":cash_balance", $email_address);
         $statement ->bindValue(":email_address", $cash_balance);
         
         $statement->execute();
         
         $statement->closeCursor();
         
 }
 
 function delete_users($email_address){
      global $database;
           $query = "Delete from stocks"
               . " where  email_address = :email_address";
             
              $statement = $database->prepare($query);
              $statement ->bindValue(":email_address", $email_address);
              $statement->execute();
              $statement->closeCursor();
         
 }

