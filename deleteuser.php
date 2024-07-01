 <?php 
    require('dbconnect.php');
    $id = $_GET["id"];
    $sql = "DELETE FROM user WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("location: customer.php");
    }
?> 
