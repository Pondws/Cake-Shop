<?php
    session_start();

    if (!$_SESSION['userid']) {
        header ("location: index.php");
    } else {
        require 'dbconnect.php';
        if(isset($_POST['order_btn'])){
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];

            $cart_qty = mysqli_query($conn, "SELECT * FROM cart");
            $product_total = 0;
            $total_price = 0;
            $product_name = array();
            if(mysqli_num_rows($cart_qty) > 0){
                while($product_item = mysqli_fetch_assoc($cart_qty)){
                    $product_name[] = $product_item['name'] . ' (' . $product_item['quantity'] . ')';
                    $product_price = number_format($product_item['price']) * $product_item['quantity'];
                    $total_price += $product_price;

                }
            }

            $total_product = implode(', ', $product_name);
            $detail_query = mysqli_query($conn, "INSERT INTO `order` (firstname, lastname, email, address, phone, total_products, total_price) VALUES ('$firstname', '$lastname', '$email', '$address', '$phone', '$total_product', '$total_price')");

            
            if($detail_query){
                // Clear cart table
                $clear_cart_query = mysqli_query($conn, "DELETE FROM cart");
                if($clear_cart_query){
                    echo "
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
                    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
                    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js'></script>
                    <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js'></script>
                    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>

                    <script>
                    $(document).ready(function() {
                        Swal.fire({
                            title: 'Thank you for shopping!',
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Continue Shopping',
                            allowOutsideClick: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'userpage.php';
                            }
                        });
                    });
                    </script>
                    ";
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>CakeAAA</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg shadow-sm p-3 bg-body rounded-0">
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
                                <a href="" class="nav-link dropdown-toggle secend-text fw-bold text-success"
                                    id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-circle-user fa-xl me-1 "></i>
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

    <div class="container">
        <div class="row justify-content-evenly mt-3">
            <div class="col-8 mt-2">
                <div class="col-12">
                    <form method="post" class="bg-white p-5">
                        <h1>Shipping address</h1>
                        <div class="d-flex mt-3">
                            <div class="w-100">
                                <label for="">Firstname</label>
                                <input type="text" class="form-control rounded-0" name="firstname" required>
                            </div>
                            <div class="ms-3 w-100">
                                <label for="">Lastname</label>
                            <input type="text" class="form-control rounded-0 " name="lastname" required>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="">Email</label>
                            <input type="email" class="form-control rounded-0" name="email" required>
                        </div>
                        <div class="mt-3">
                            <label for="">Address</label>
                            <input type="address" class="form-control rounded-0" name="address" required>
                        </div>
                        <div class="mt-3">
                            <label for="">Phone</label>
                            <input type="text" class="form-control rounded-0" name="phone" required>
                        </div>
                        <div class="d-flex mt-4">
                            <input type="submit" onclick="confirmPurchase()" value="Make Purchase" name="order_btn" class="btn btn-success w-100 p-2 rounded-0" >
                            <a href="cart.php" class="btn btn-light p-2  ms-3 w-100 rounded-0">Return to cart</a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-4">
                <div class="bg-white p-4 mt-2">
                    <?php 
                        require 'dbconnect.php';
                        $sql = "SELECT * FROM cart";
                        $select_cart = mysqli_query($conn, $sql);
                        $total_price = 0;

                        if(mysqli_num_rows($select_cart) > 0){
                            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                                // $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
                                $total_price += $fetch_cart['price']; 
                    ?>
                    <div class="row align-content-center">
                        <div class="col-5 my-2 align-content-center">
                            <img src="./images/<?php echo $fetch_cart['image']; ?>" width="120" height="80">
                        </div>
                        <div class="col-3 align-content-center">
                            <div>
                                <?php echo $fetch_cart['name'];?>
                            </div>
                            <div>
                                <span>Qty: <?php echo $fetch_cart['quantity'];?> </span>
                            </div>
                        </div>
                        <div class="col-4 align-content-center text-end">
                        <?php echo $fetch_cart['price'];?>
                        </div>
                    </div>

                    <?php 
                    }
                } 
                ?>
                    <hr>
                    <div class="row">
                        <div class="col-5">
                            <h6>Total price:</h6>
                        </div>
                        <div class="col-7 text-end">
                            <h6><?php echo number_format($total_price, 2); ?></h6></h6>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-5">
                            <h6>Discount:</h6>
                        </div>
                        <div class="col-7 text-end">
                            <h6>0.00</h6>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-5">
                            <h4>Total:</h4>
                        </div>
                        <div class="col-7 text-end">
                            <h4><?php echo number_format($total_price, 2); ?></h4>
                        </div>
                    </div>
                </div>
                
            </div>
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