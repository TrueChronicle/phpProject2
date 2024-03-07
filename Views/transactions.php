<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>transactions list</title>
    </head>
    <?php include ('topNavigation.php'); ?>
    <body>
        <table>
            <tr>
                <th>User ID</th>
                <th>Stock ID </th>
                <th>Quantity</th>
                <th>price</th>
                <th>timestamp</th>
                <th>id</th>
            </tr>
             <?php foreach ($transactions as $transaction) : ?>
            <tr>
                <td><?php echo $transaction['user_id']; ?> </td>
                <td><?php echo $transaction['stock_id']; ?> </td>
                <td><?php echo $transaction['quantity']; ?> </td>
                <td><?php echo $transaction['price']; ?> </td>
                <td><?php echo $transaction['timestamp']; ?> </td>
                <td><?php echo $transaction['id']; ?> </td>
            </tr>

            <?php endforeach; ?>
        </table>
        <h2>Add Transaction</h2>
        <form action="transactions.php" method="post"> 
         <label>User ID </label>
        <input type="text" name="user_id"/><br>
        <label>Stock ID:</label>
        <input type="text" name="stock_id"/><br>
         <label>Quantity:</label>
        <input type="text" name="quantity"/><br>
        <label>Price </label>
        <input type="text" name="price"/><br>
        <input type="hidden" name="action" value="insert"/><br>
        <label>&nbsp;</label>
        <input type="submit" value="Add stock"/>
        </form>
        
        <h2>Update Transaction</h2>
        <form action="transactions.php" method="post"> 
        <label>ID:</label>
         <input type="text" name="id/><br>
        <label>User ID </label>
        <input type="text" name="user_id"/><br>
        <label>Stock ID:</label>
        <input type="text" name="stock_id"/><br>
         <label>Quantity:</label>
        <input type="text" name="quantity"/><br>
        <label>Price </label>
        <input type="text" name="price"/><br>
        <input type="hidden" name="action" value="update"/><br>
        <label>&nbsp;</label>
        <input type="submit" value="update stock"/>
        </form>
        
        
         <h2>Delete transaction</h2>
         <form action="transactions.php" method="post"> 
         <label>ID:</label>
         <input type="text" name="id/><br>
         <input type="hidden" name="action" value="delete"/><br>
        <label>&nbsp;</label>
        <input type="submit" value="Delete users"/>
        </form>
    </body>
    <?php include ('footer.php'); ?>
</html>

