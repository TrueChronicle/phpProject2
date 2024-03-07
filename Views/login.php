<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
     <?php include ('topNavigation.php'); ?>
    </br>
    <body>
    <form action="login.php" method="post"> 
         <h2>Login</h2>
         <?php echo $message ?>
         <label>Email Address:</label>
        <input type="text" name="email_address"/><br>
        <label>Password:</label>
        <input type="password" name="password"/><br>
        <label>&nbsp;</label>
        <input type="submit" value="Submit"/>
        </form>
   </body>
    </br>
    <?php include ('footer.php'); ?>
</html>
