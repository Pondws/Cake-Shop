<?php 
    require "dbconnect.php";

    if(isset($_POST['submit'])){
    $product_name = trim($_POST['product_name']);
    $price = trim($_POST['price']);
    $detail = trim($_POST['detail']);
    $image_name = $_FILES['image']['name'];

    $image_tmp = $_FILES['image']['tmp_name'];
    $folder = 'images/';
    $image_location = $folder . $image_name;

    $sql = "INSERT INTO products (product_name, detail, price, image)
            VALUES ('$product_name', '$detail', '$price', '$image_name')";
    $result = mysqli_query($conn, $sql);

    if($result) {
        move_uploaded_file($image_tmp, $image_location);
        $_SESSION['message'] = 'เพิ่มข้อมูลสินค้าสำเร็จ';
        header('location: products.php');
    } else {
        $_SESSION['message'] = 'เพิ่มข้อมูลสินค้าล้มเหลว';
        header('location: products.php');
    }
}
?>