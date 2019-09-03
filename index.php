 <?php

    require 'php/config/db.php';

   ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product List</title>
    <!--Connecting css-->
    <link rel="stylesheet" type="text/css" href="public/css/mainpage.css" />
</head>
<body>

<!--Connecting PHP code-->
   <h1>Product list</h1>
   <select name="choice">
    <option value="t1">Mass delete action</option>
   </select> 
   <input type="submit" value="Apply">
   <hr>

<!--Getting data from DB with function-->
    <?php 

    foreach ($products as $product):
            
    ?>
        <ul class="productsList">
            <li name="SKU"><?php echo ("пава")?></li>
            <li name="name"><?php echo $product["name"]; ?></li>
            <li name="price"></li>
            <li name="value"></li>
        </ul>

    <?php endforeach; ?> 
    
    <!--To another page-->
    <a href="productAdd.php">Add a new one!</a>

</body>
</html>