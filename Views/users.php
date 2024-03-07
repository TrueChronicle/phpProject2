<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>users list</title>
    </head>
    <?php include ('topNavigation.php'); ?>
    <body>
        <table>
            <tr>
                <th>name</th>
                <th>Email Address</th>
                <th>Cash Balance</th>
                <th>id</th>
            </tr>
             <?php foreach ($users as $user) : ?>
            <tr>
                <td><?php echo $user['name']; ?> </td>
                <td><?php echo $user['email_address']; ?> </td>
                <td><?php echo $user['cash_balance']; ?> </td>
                <td><?php echo $user['id']; ?> </td>
            </tr>

            <?php endforeach; ?>
        </table>
        <h2>Add or update User</h2>
        <form action="users.php" method="post"> 
         <label>Name:  </label>
        <input type="text" name="Name"/><br>
        <label>Email Address:</label>
        <input type="text" name="email_address"/><br>
         <label>Cash Balance:</label>
        <input type="text" name="cash_balance"/><br>
        <input type="hidden" name="action" value="insert_or_update"/><br>
        <input type="radio" name="insert_or_update" value="insert" checked>Add</br>
        <input type="radio" name="insert_or_update" value="update" >Update</br>
        <label>&nbsp;</label>
        <input type="submit" value="Submit"/>
        </form>
        
         <h2>Delete User</h2>
         <form action="users.php" method="post"> 
             
        <input type="hidden" name="action" value="delete"/><br>
        <label>&nbsp;</label>
        <input type="submit" value="Delete users"/>
        </form>
    </body>
    </br>
    <?php include ('footer.php'); ?>
</html>

