<?php
    require('dbconnect.php');
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $telephone = $_POST['telephone'];
    $sql = "UPDATE user SET firstname = '$firstname', lastname = '$lastname', telephone = '$telephone' WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if($result){
        header('location:customer.php');
    }
?>