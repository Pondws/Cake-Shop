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
                    <a href="products.php" class="list-group-item list-group-item-action py-3 fw-bold">
                        <i class="fas fa-gift me-2"></i>
                        Products
                    </a>
                </div>

                <div class="list-group list-group-flush px-2">
                    <a href="addproduct.php" class="list-group-item list-group-item-action py-3 fw-bold bg-black active">
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

            <div class="container-fluid  p-0">
                <div class="bg-white shadow-sm p-2">
                    <div class="px-4 pt-3">
                    <div class="d-flex justify-content-between mb-3">
                        <h1>Add Products</h1>
                    </div>


                    <form action="insertproduct.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="product_name" class="col-form-label">Product Name</label>
                            <input type="text" name="product_name" class="form-control rounded-0" id="product_name" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="price" class="col-form-label">Price</label>
                            <input type="number" min="1" name="price" class="form-control rounded-0" id="price" required>
                        </div>

                        <div class="mb-3">
                            <label for="detail" class="col-form-label">Detail</label>
                            <input type="text" name="detail" class="form-control rounded-0" id="detail" required>
                        </div>
           
                        <div class="mb-3">
                            <label for="image" class="col-form-label">Product Image</label>
                            <input type="file" name="image" accept=".jpg, .jpeg, .png" class="form-control rounded-0" id="image" required>
                        </div>

                        <div class="my-4">
                            <button type="reset" class="btn btn-warning rounded-0 me-2" value="Reset Data">Reset Data</button>
                            <button type="submit" name="submit" class="btn btn-primary rounded-0">Add New Product</button>
                        </div>
                    </form>

                </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <!-- <div class="modal fade " id="addproduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Add Product</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="product_name" class="col-form-label">Product Name</label>
                            <input type="text" name="product_name" class="form-control rounded-0" id="product_name">
                        </div>

                        <div class="mb-3">
                            <label for="detail" class="col-form-label">Detail</label>
                            <input type="text" name="detail" class="form-control rounded-0" id="detail"></input>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="col-form-label">Price</label>
                            <input type="text" name="price" class="form-control rounded-0" id="price"></input>
                        </div>
                        
                        <div class="mb-3">
                            <label for="image" class="col-form-label">Product Image</label>
                            <input type="file" name="image" accept=".jpg, .jpeg, .png" class="form-control rounded-0" id="image"></input>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-0 w-25" data-bs-dismiss="modal">Close</button>
                    <a href="insertproduct.php" type="submit" name="submit" class="btn btn-primary rounded-0 w-25">Save</a>
                </div>
            </div>
        </div>
    </div> -->


    <script src="app.js"></script>
</body>

</html>

<?php } ?>