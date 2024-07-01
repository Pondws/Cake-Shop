<?php
    session_start();

    if (!$_SESSION['userid']) {
        header ("location: index.php");
    } else {
        require 'dbconnect.php';
        if(isset($_POST['add_to_cart'])){
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $product_image = $_POST['product_image'];
            $product_quantity = 1;

            $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE name = '$product_name'");

            if(mysqli_num_rows($select_cart) > 0){
                // echo '<script> alert("product already added to cart"); </script>';
            } else {
                $insert_product = mysqli_query($conn, "INSERT INTO cart (name, price, image, quantity)
                    VALUES('$product_name', '$product_price', '$product_image', '$product_quantity');");
                // echo '<script> alert("product added to cart successfull"); </script>';
            }
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style1.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg shadow-sm p-3 bg-body rounded-0 fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-success" href="userpage.php">CakeAAA</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                </ul>
                <div class="d-flex gap-4">
                    <div class="align-self-center">

                        <?php 
                            $select_rows = mysqli_query($conn, "SELECT * FROM cart");
                            $row_count = mysqli_num_rows($select_rows);
                        ?>
                        <a href="cart.php">
                            <i class="fa-solid fa-cart-shopping fa-xl text-success"></i>
                            <?php 
                            if ($row_count == 0){
                                echo '';
                            }else{
                                echo '<span class="badge bg-success rounded-pill position-absolute top-40 translate-middle">';
                                echo $row_count;
                                echo '</span>';
                            }
                            ?>
                            
                        </a>      
                    </div>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a href="" class="nav-link dropdown-toggle secend-text fw-bold text-success" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-circle-user fa-xl me-1"></i>
                                    <?php echo $_SESSION['user']; ?>
                                </a>
                                <ul class="dropdown-menu rounded-0 p-2" aria-labelledby="navbarDropdown">
                                    <li><a onclick="logout()" class="dropdown-item">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <section id="slider">
        <div class="carousel slide" data-bs-ride="carousel" id="myslider">
            <ol class="carousel-indicators">
                <button data-bs-target="#myslider" data-bs-slide-to="0"></button>
                <button data-bs-target="#myslider" data-bs-slide-to="1" class="active"></button>
                <button data-bs-target="#myslider" data-bs-slide-to="2"></button>
            </ol>

            <div class="carousel-inner">
                <div class="carousel-item carousel-image-1 active">
                    <div class="container">
                        <div class="carousel-caption d-none d-sm-block">
                        
                        </div>
                    </div>
                </div>

                <div class="carousel-item carousel-image-2">
                    <div class="container">
                        <div class="carousel-caption d-none d-sm-block">
                        
                        </div>
                    </div>
                </div>

                <div class="carousel-item carousel-image-3">
                    <div class="container">
                        <div class="carousel-caption d-none d-sm-block">
                    
                        </div>
                    </div>
                </div>

                <button class="carousel-control-prev" data-bs-target="#myslider" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" data-bs-target="#myslider" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </section>

    <div class="container">
        <h1 class="text-center fw-bold mt-4 pt-4 text-success">Products</h1>
        <div class="row mb-4">
            <?php 
            require 'dbconnect.php';
            $sql = "SELECT * FROM products";
            $result = mysqli_query($conn, $sql);
            
            while ($row = mysqli_fetch_assoc($result)) { ?>

            <form action="" method="post" class="col-lg-4 col-md-6 col-xl-3 mt-4">
                <div class="card h-100 shadow bg-body rounded-0 mb-4 border-0">
                    <img src="images/<?php echo $row['image']; ?>" width="175" height="240"
                        class="card-img-top p-3">
                    <div class="card-body py-0">
                        <h4 name="product_name" class="card-title"><?php echo $row['product_name'] ?></h4>
                        <p class="card-text text-muted" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                            <?php echo $row['detail'] ?>
                        </p>
                    </div>

                    <input type="hidden" name="product_name" value="<?php echo $row['product_name'] ?>">
                    <input type="hidden" name="product_price" value="<?php echo $row['price'] ?>">
                    <input type="hidden" name="product_image" value="<?php echo $row['image'] ?>">


                    <div class="d-flex justify-content-between p-3 pt-0">
                        <span name="product_price" class="align-content-center fw-bold">
                            <?php echo $row['price'] ?> บาท
                        </span>
                        <button type="submit" name="add_to_cart" class="btn btn-success rounded-0">
                            <i class="fa-solid fa-cart-shopping me-1" style="color: #ffffff;"></i>
                            เพิ่มลงในตะกร้า
                        </button>
                    </div>
                </div>
            </form>
            <?php } ?>
        </div>
    </div>

    <div class="shadow bg-body rounded-0 bg-white mt-4">
        <div class="container">
            <footer class="pt-2 mt-5">
                <div class="d-flex flex-column flex-sm-row justify-content-between py-4 mt-4 border-top">
                    <p>© 2024 Company, Inc. All rights reserved.</p>
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

    <script>
        const logout = () => {
            Swal.fire({
                title: 'ยืนยันการออกจากระบบ',
                text: 'คุณต้องการออกจากระบบใช่หรือไม่?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่, ออกจากระบบ',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'logout.php';
                }
            });
        };
    </script>
</body>

</html>

<?php } ?>