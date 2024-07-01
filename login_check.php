<?php 
    session_start();

    if (isset($_POST['username'])) {
        include('dbconnect.php');

        $username = $_POST['username'];
        $password = $_POST['password'];

        $passwordenc = md5($password);

        $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$passwordenc'";
        
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);

            $_SESSION['userid'] = $row['id'];
            $_SESSION['user'] = $row['firstname'] . " " . $row['lastname'];
            $_SESSION['userlevel'] = $row['userlevel'];

            if ($_SESSION['userlevel'] == 'a') {
                header('location: adminpage.php');
            }

            if ($_SESSION['userlevel'] == 'm') {
                header('location: userpage.php');
            }
        } else {
            header('location: login.php');
            echo "<script> alert(Username หรือ Password ไม่ถูกต้อง) </script>";
        }
    } else {
        header('location: index.php');
    }

?>
