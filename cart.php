<?php
    session_start();

    if (!$_SESSION['userid']) {
        header ("location: index.php");
    } else {
        require 'dbconnect.php';
        if(isset($_GET['remove'])){
            $remove_id = $_GET['remove'];
            mysqli_query($conn, "DELETE FROM cart WHERE id = '$remove_id'");
            header('location: cart.php');
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

    <title>Cart</title>
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
            <div class="col-8">
                <div class="bg-white p-4 mt-2">
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th width="200">รูปสินค้า</th>
                                <th>ชื่อสินค้า</th>
                                <th>จำนวน</th>
                                <th>ราคา</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                require 'dbconnect.php';
                                $sql = "SELECT * FROM cart";
                                $select_cart = mysqli_query($conn, $sql);
                                $total_price = 0;

                                if(mysqli_num_rows($select_cart) > 0){
                                    while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                                        $total_price += $fetch_cart['price']; 
                            ?>
                                <tr class="text-center">
                                    <td class="align-content-center">
                                        <img src="./images/<?php echo $fetch_cart['image']; ?>" width="175" height="135">
                                    </td>
                                    <td class="align-content-center"><?php echo $fetch_cart['name'];?></td>
                                    <td class="align-content-center"><?php echo $fetch_cart['quantity'];?></td>
                                    <td class="align-content-center"><?php echo $fetch_cart['price'];?></td>
                                    <td class="align-content-center">
                                        <a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" 
                                            class="btn btn-danger rounded-0 "
                                            onclick="return confirm('remove item from cart?')">
                                            <i class="fa-regular fa-trash-can" style="color: #ffffff;"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php 
                                }
                            }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>



            <div class="col-4 mt-2">
                <div class="col-12 ">
                    <div class="bg-white p-4">
                        <h4>Have coupon?</h4>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control rounded-0" placeholder="Coupon code">
                            <div class="input-group-append">
                                <button class="btn btn-success rounded-0" type="button">Apply</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-4">
                    <div class="bg-white p-4">
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
                                <h6>00.00</h6>
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
                        <div class="mt-3">
                            <?php 
                                if($total_price == 0){
                                    echo '<a class="btn btn-light w-100 rounded-0" disabled>Continue</a>';
                                } else {
                                    echo '<a href="checkout.php" class="btn btn-success w-100 rounded-0">Continue</a>';
                                }
                            ?>
                            <a href="userpage.php" class="btn btn-light form-control w-100 rounded-0 mt-2">Back to shop</a>
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