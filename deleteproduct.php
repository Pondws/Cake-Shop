<?php 
    require('dbconnect.php');
    $product_id = $_GET["product_id"];
    $sql = "DELETE FROM products WHERE product_id = $product_id";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("location: products.php");
    }
?> 
