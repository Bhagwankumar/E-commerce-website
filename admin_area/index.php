<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin DashBoard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
          crossorigin="anonymous">
    <link rel="stylesheet" 
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./index.css">
    <style>
        .admin-img{
             width:100px;
             object-fit: contain;
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0">

        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <!--<img src="../images.png" alt="">-->
                <nav class="navbar navbar-expand-lg navbar-light bg-info">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome Guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
        <!--second child-->
        <div class="bg-light">
            <h2 class="text-center p-2">Manage Details</h2>
        </div>

        <!--third child-->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-item-center">
                <div class="px-5">
                    <a href=""><img src="../zlatko-duric-U4QkDQW84sg-unsplash.jpg" alt="" class="admin-img"></a>
                    <p class="text-light text-center">Admin name</p>

                </div>
                    <!--<button><a href="" class="nav-link text-light bg-info my-1"></a></button>-->
                <div class="button text-center">
                     <button class="box"><a href="insert_product.php" class="main nav-link text-light bg-info my-1">Insert Product</a></button>
                     <button class="box"><a href="" class="main nav-link text-light bg-info my-1">View Product</a></button>
                     <button class="box"><a href="index.php?insert_category" class="main nav-link text-light bg-info my-1">Insert Catagories</a></button>
                     <button class="box"><a href="" class="main nav-link text-light bg-info my-1">View Catagories</a></button>
                     <button class="box"><a href="index.php?insert_brand" class="main nav-link text-light bg-info my-1">Insert Brand</a></button>
                     <button class="box"><a href="" class="main nav-link text-light bg-info my-1">View Brand</a></button>
                     <button class="box"><a href="" class="main nav-link text-light bg-info my-1">All Orders</a></button>
                     <button class="box"><a href="" class="main nav-link text-light bg-info my-1">All Payment</a></button>
                     <button class="box"><a href="" class="main nav-link text-light bg-info my-1">List Users</a></button>
                     <button class="log"><a href="" class="main nav-link text-light bg-info my-1">Logout</a></button>
                </div>
            </div>
        </div>

        <!--fourth child-->

        
        <div class="container my-5">
            <?php
                if(isset($_GET['insert_category'])){
                    include('insert_catagories.php');
                }
                if(isset($_GET['insert_brand'])){
                    include('insert_brand.php');
                }
            ?>
        </div>
        
        <!--include footer-->

            <?php
            
            include('../include/footer.php');

            ?>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
        crossorigin="anonymous"></script>
</body>
</html>