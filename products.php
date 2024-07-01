<?php 
    session_start();
    
    if (!$_SESSION['userid']) {
        header("Location: index.php");
    } elseif ($_SESSION['userlevel'] == 'm'){
        header("Location: userpage.php");
    } else {
    
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
    <title>Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="style1.css">

    
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center">
                <h1>CakeAAA</h1>
            </div>
            <div>
                <div class="list-group list-group-flush px-2">
                    <a href="adminpage.php" class="list-group-item list-group-item-action py-3 fw-bold">
                        <i class="fa-solid fa-chart-simple fa-lg me-2"></i>
                        Dashboard
                    </a>
                </div>
                <div class="list-group list-group-flush px-2">
                    <a href="customer.php" class="list-group-item list-group-item-action py-3 fw-bold">
                        <i class="fa-solid fa-user-large me-2"></i>
                        Customers
                    </a>
                </div>
                <div class="list-group list-group-flush px-2">
                    <a href="products.php" class="list-group-item list-group-item-action py-3 fw-bold bg-black active">
                        <i class="fas fa-gift me-2"></i>
                        Products
                    </a>
                </div>
                <div class="list-group list-group-flush px-2">
                    <a href="addproduct.php" class="list-group-item list-group-item-action py-3 fw-bold">
                        <i class="fa-solid fa-square-plus me-2"></i>
                        Add Product
                    </a>
                </div>
                <div class="list-group list-group-flush px-2">
                    <a onclick="logout()" class="list-group-item list-group-item-action py-3 fw-bold text-danger">
                        <i class="fas fa-power-off me-2"></i>
                        Logout
                    </a>
                </div>
            </div>
        </div>

        <div class="page-content-wrapper m-2 w-100">
        <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 px-4 shadow-sm mb-2">
            <div class="d-flex align-items-center">
                <i class="fa-solid fa-bars fa-xl" id="menu-toggle"></i>
            </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a href="" class="nav-link dropdown-toggle secend-text fw-bold" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-circle-user fa-xl me-1 text-dark"></i>
                                <?php echo $_SESSION['user']; ?>
                                
                            </a>
                            <ul class="dropdown-menu rounded-0" aria-labelledby="navbarDropdown">
                                <li><a onclick="logout()" class="dropdown-item">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid p-0">
                <div class="bg-white shadow-sm p-2">
                    <div class="px-4 pt-3">
                    <div class="d-flex justify-content-between mb-3">
                        <h1>Products</h1>
                    </div>


                    <table class="table table-bordered" >
                        <thead>
                            <tr>
                                <th class="text-center" width="150px">Product ID</th>
                                <th width="175px">Product Image</th>
                                <th width="175px">Product Name</th>
                                <th>Detail</th>
                                <th width="150px" class="text-end">Price</th>
                                <th width="250px"></th>
                            </tr>
                        </thead>


                        <?php 
                            require 'dbconnect.php';
                            $sql = "SELECT * FROM products ORDER BY product_id DESC";
                            $result = mysqli_query($conn, $sql);
                            
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tbody>
                                <tr>
                                    <td class="text-center align-content-center">
                                        <?php echo $row['product_id'] ?>
                                    </td>
                                    <td class="align-content-center">
                                        <img src="<?php echo $base_url; ?>/images/<?php echo $row['image'] ?>" width="175"  height="110">
                                    </td>
                                    <td class="align-content-center">
                                        <?php echo $row['product_name'] ?>
                                    </td>
                                    <td class="align-content-center">
                                        <?php echo $row['detail'] ?>
                                    </td>
                                    <td class="align-content-center text-end">
                                        <?php echo $row['price'] ?>
                                    </td>
                                    <td class="align-content-center text-center">
                                        <a href="editdataproduct.php?product_id=<?php echo $row['product_id']; ?>"
                                            onclick="return confirm('คุณต้องการแก้ไขข้อมูลสินค้าหรือไม่')"
                                            class="btn btn-warning rounded-0 w-100">
                                            <i class="fa-solid fa-pen-to-square me-1"></i>
                                            Edit
                                        </a>
                                        <a href="deleteproduct.php?product_id=<?php echo $row['product_id']; ?>"
                                            onclick="return confirm('คุณต้องการลบข้อมูลสินค้าหรือไม่')"
                                            class="btn btn-danger rounded-0 mt-md-2 w-100">
                                            <i class="fa-solid fa-trash me-1"></i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            </tbody>

                            <?php } ?>
                    </table>    
                </div>
                </div>

            </div>
        </div>
    </div>

    <script src="app.js"></script>
</body>

</html>

<?php } ?>