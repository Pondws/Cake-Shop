<?php
    require('dbconnect.php');
    $id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $detail = $_POST['detail'];
    $image = $_POST['image'];
    $sql = "UPDATE products SET product_name = '$product_name', price = '$price', detail = '$detail', image = '$image' WHERE product_id = $id";
    $result = mysqli_query($conn, $sql);

    if($result){
        header('location:products.php');
    }
?>