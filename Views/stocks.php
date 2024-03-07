<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>stocks list</title>
    </head>
    <?php include ('topNavigation.php'); ?>
    <body>
        <table>
            <tr>
                <th>symbol</th>
                <th>name</th>
                <th>Current Price</th>
                <th>id</th>
            </tr>
             <?php foreach ($stocks as $stock) : ?>
            <tr>
                <td><?php echo $stock['symbol']; ?> </td>
                <td><?php echo $stock['name']; ?> </td>
                <td><?php echo $stock['current_price']; ?> </td>
                <td><?php echo $stock['id']; ?> </td>
            </tr>

            <?php endforeach; ?>
        </table>
        <h2>Add or update Stock</h2>
        <form action="stocks.php" method="post"> 
        <label>Symbol: </label>
        <input type="text" name="Symbol"/><br>
        <label>Name:  </label>
        <input type="text" name="Name"/><br>
        <label>Current Price:  </label>
        <input type="text" name="Current price"/><br>
        <input type="hidden" name="action" value="insert_or_update"/><br>
        <input type="radio" name="insert_or_update" value="insert" checked>Add</br>
        <input type="radio" name="insert_or_update" value="update" >Update</br>
        <label>&nbsp;</label>
        <input type="submit" value="Submit"/>
        </form>
        
         <h2>Delete Stock</h2>
         <form action="stocks.php" method="post"> 
         <?php include("stockSymbolDropDown.php"); ?>
        <input type="hidden" name="action" value="delete"/><br>
        <label>&nbsp;</label>
        <input type="submit" value="Delete Stock"/>
        </form>
    </body>
    <?php include ('footer.php'); ?>
</html>

