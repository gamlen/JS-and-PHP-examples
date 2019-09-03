<?php

    require 'php/config/data.php';

   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Add</title>
    <script type="text/javascript" src="public/js/ui.js"></script>
    <link rel="stylesheet" type="text/css" href="public/css/products.css" />

</head>
<body>
 <!--Posting data to DB-->
    <form method="POST" action="">
        <input name="SKU" type="text"/>
        <input name="name" type="text"/>
        <input name="price" type="number"/>
        <select name="" id="selectid">
            <option value="Size" id="sizeOption">Size (in MB) for DVD-disc</option>
            <option value="Dimensions" id="dimensionsOption">Dimensions (HxWxL) for Furniture</option>
            <option value="Weight" id="weightOption">Weight (in Kg) for Book</option>
        </select>
        <input name="size" type="number"/>
        <input name="HxDimensions" type="number"/>
        <input name="WxDimensions" type="number"/>
        <input name="LxDimensions" type="number"/> 
        <input name="weight" type="number"/>  
        <input type="submit" name="submit" value="Send data"/>
    </form>

 <!--To another page-->
        <a href="index.php">Back to the products</a>
</body>
</html>
