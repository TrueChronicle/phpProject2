<?php
session_start();
try{
   require_once 'utility/ensure_logged_in.php';  
   require_once 'Models/database.php';
   require_once 'Models/users.php';  
   
   
     $action = htmlspecialchars(filter_input(INPUT_POST, "action"));
     
     $name = htmlspecialchars(filter_input(INPUT_POST, "name"));
     $email_address = htmlspecialchars(filter_input(INPUT_POST, "email_address"));
     $cash_balance = filter_input(INPUT_POST, "cash_balance",FILTER_VALIDATE_FLOAT);
     
 if( $action == "insert_or_update" && $name != "" && $email_address != "" && $cash_balance != 0 ){
      $insert_or_update = filter_input(INPUT_POST, 'insert_or_update');
      
      if($insert_or_update == "insert"){
        insert_users($name, $email_address, $cash_balance);
      }
      else if($insert_or_update == "update"){
        update_users($name, $email_address, $cash_balance);
      }
      header("Location: users.php");
      
  }

   else if($action == "delete" && $email_address != ""){
           delete_stock($email_address);
          header("Location: users.php");
         }
    else if($action != ""){
        $error_message = "Error, Please try again";
        include('views/error.php');
    }
        
    
    $users = list_users();
            
     include('views/users.php');

 } catch (Exception $e) {
         $error_message = $e->getMessage();
include('views/error.php'); 
 }
         
?>



 <?php
        class Book  {
          
            private 
                    $brand, 
                    $author, 
                    $publication_year;
        
            public function __construct($title, $author, $year){
              $this->setAuthor($author);
              $this->setPublication_year($year);
              $this->setTitle($title);
            }
            public function getTitle() {
                return $this->title;
            }

            public function getAuthor() {
                return $this->author;
            }

            public function getPublicationYear() {
                return $this->year;
            }

            public function setTitle($title) {
                $this->title = $title;
            }

            public function setAuthor($author) {
                $this->author = $author;
            }

            public function setPublicationYear($year) {
                $this->year = $year;
            }
        
        }