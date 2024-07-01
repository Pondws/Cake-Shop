<?php 

    session_start();

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
    <title>Login</title>
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
                        <h3 class="text-center py-2 fw-bold">Login</h3>
                        
                        <form action="login_check.php" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control rounded-0" id="username" placeholder="Username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control rounded-0" id="password" placeholder="Password">
                            </div>

                            <div class="d-flex justify-content-between">
                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input rounded-0" id="remember">
                                    <label class="form-check-label" for="remember">Remember me</label>
                                </div>
                                <a href="#">Forget password?</a>
                            </div>
                            <input type="submit" name="submit" class="btn btn-success w-100 rounded-0 mb-3" value="Login">
                            <!-- <button type="submit" name="submit" class="btn btn-success w-100 rounded-0 mb-3">Login</button> -->
                            <div class="text-center">Don't have an account? <a href="register.php">Signup</a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="position-fixed bottom-0 w-100">
        <div class="shadow bg-body rounded-0 bg-white mt-4 ">
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
    </div>
</body>

</html>