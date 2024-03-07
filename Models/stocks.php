<?php
   
    
function list_stocks(){
     global $database;
    $query = 'SELECT symbol, name, current_price, id FROM stocks';
     
     $statement = $database->prepare($query);
     
     $statement->execute();
     
     $stocks = $statement->fetchAll();
     
     $statement->closeCursor();
     
     return $stocks;
}

function insert_stock($symbol, $name, $current_price){
     global $database;
    $query = "INSERT INTO stocks (symbol, name, current_price)"
                 . "VALUES (:symbol, :name, :current_price)";
         
         $statement = $database->prepare($query);
         $statement ->bindValue(":symbol", $symbol);
         $statement ->bindValue(":name", $name);
         $statement ->bindValue(":Current Price", $current_price);
         $statement->execute();
         $statement->closeCursor();
        }
        
 function update_stock($symbol, $name, $current_price) {
      global $database;
      $query = "update stocks set name = :name, current_price = :current_price"
                 . "VALUES (:symbol, :name, :current_price)";
         $statement = $database->prepare($query);
         
         $statement ->bindValue(":symbol", $symbol);
         $statement ->bindValue(":name", $name);
         $statement ->bindValue(":Current Price", $current_price);
         
         $statement->execute();
         
         $statement->closeCursor();
         
 }
 
 function delete_stock($symbol){
      global $database;
           $query = "Delete from stocks"
               ."where symbol = :symbol";
             
              $statement = $database->prepare($query);
              $statement ->bindValue(":symbol", $symbol);
              $statement->execute();
              $statement->closeCursor();
         
 }

