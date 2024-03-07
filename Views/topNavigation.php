<?php


?>

<!DOCTYPE html>
  <header>
    <a href="index.php">Home</a>
    <a href="login.php">Login</a>
    <?php
        if(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']){ ?>
        <a href="stocks.php">Stocks</a>
        <a href="Users.php">Users</a>
        <a href="transactions.php">Transactions</a>
        <a href="login.php?action=logout">Logout</a>
        <?php }
        
        ?>
        
        
        
        </header>
  
    
