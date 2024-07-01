<?php
    session_start();
    require_once "dbconnect.php";

    if(isset($_POST['submit'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phone = $_POST['phone'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user_check = "SELECT * FROM user WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($conn, $user_check);
        $user = mysqli_fetch_assoc($result);

        if ($user['username'] === $username) {
            echo "<script> alert('Username already exists');</script>";
        } else {
            $passwordenc = md5($password);

            $sql = "INSERT INTO user(firstname, lastname, telephone, username, password, userlevel)
                VALUES('$firstname', '$lastname', '$phone', '$username', '$passwordenc', 'm')";
            
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $_SESSION['success'] = "Insert user successfully";
                header('location: login.php');
            } else {
                $_SESSION['error'] = "Something went wrong";
                header('location: register.php');
            }
    }        
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style1.css">
    <title>Register</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg shadow-sm p-3 bg-body rounded-0">
        <div class="container">
            <a class="navbar-brand fw-bold text-success" href="index.php">CakeAAA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                </ul>
                <div class="d-flex gap-4">
                    <a href="login.php" class="btn btn-success rounded-0" style="width: 7rem;">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-5">
                <div class="shadow p-3 bg-body rounded-0">
                    <div class="card-body p-4">
                        <h3 class="text-center py-2 fw-bold">Signup</h3>

                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Firstname</label>
                                <input type="text" name="firstname" class="form-control rounded-0" required>
                            </div>

                            <div class="mb-3">
                                <label for="lastname" class="form-label">Lastname</label>
                                <input type="text" name="lastname" class="form-control rounded-0" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="phone" class="form-label">Telephone</label>
                                <input type="text" name="phone" class="form-control rounded-0">
                            </div>

                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control rounded-0" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control rounded-0" id="password" required>
                            </div>
    
                            <button name="submit" type="submit" class="btn btn-success w-100 rounded-0 mt-2 mb-3">Login</button>
                            <div class="text-center">Already have an account? <a href="login.php">Login</a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="shadow bg-body rounded-0 bg-white mt-4">
        <div class="container">
            <footer class="pt-2 mt-5">
                <div class="d-flex flex-column flex-sm-row justify-content-between py-4 mt-4 border-top">
                    <p>© 2024 CakeAAA, Inc. All rights reserved.</p>
                    <ul class="list-unstyled d-flex">
                        <li class="ms-3">
                            <a class="link-dark" href="#">
                                <i class="fa-brands fa-instagram fa-xl"></i>
                            </a>
                        </li>
                        <li class="ms-3">
                            <a class="link-dark" href="#">
                                <i class="fa-brands fa-facebook fa-lg"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </footer>
        </div>
    </div>

</body>

</html>