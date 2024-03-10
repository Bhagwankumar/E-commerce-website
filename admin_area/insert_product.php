<?php

include('../include/connect.php');

if(isset($_POST['insert_product'])){

      $product_title=$_POST['product_title'];
      $description=$_POST['description'];
      $product_keyword=$_POST['product_keyword'];
      $product_category=$_POST['product_category'];
      $product_brands=$_POST['product_brands'];
      $product_price=$_POST['product_price'];
      $product_status="true";

      //accessing images

      $product_image1=$_FILES['product_image1']['name'];
      $product_image2=$_FILES['product_image2']['name'];
      $product_image3=$_FILES['product_image3']['name'];
    
      //accessing image tmp name

      $temp_image1=$_FILES['product_image1']['tmp_name'];
      $temp_image2=$_FILES['product_image2']['tmp_name'];
      $temp_image3=$_FILES['product_image3']['tmp_name'];
      
      //checkiing empty conditions

      if($product_title=='' or $description=='' or $product_keyword=='' or $product_category=='' or $product_brands=='' or $product_price=='' 
          or $product_image1=='' or $product_image2=='' or $product_image3==''){
        echo "<script>alert('Please fill the availabel fields')</script>";
        exit();
      }
      else{
           move_uploaded_file($temp_image1,'./product_image',$product_image1);
           move_uploaded_file($temp_image2,'./product_image',$product_image2);
           move_uploaded_file($temp_image3,'./product_image',$product_image3);

        //insert query

        $insert_products="insert into `products`(product_title,product_description,product_keyword,category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status,
                            values('$product_title','$description','$product_keyword','$product_categories','$product_brands','$product_image1','$product_image2','$product_image3','$product_price'NOW(),'$product_status'))";
        $result_query=mysqli_query($con,$insert_products);
        if($result_query){
          echo "<script>alert('Successfully insert the product')</script>";
        }
      }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
          crossorigin="anonymous">
    <link rel="stylesheet" 
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./index.css">
</head>
<body class="bg-light">

        <div class="container2 mt-3">
            <h1 class="text-center">Insert Products</h1>

            <!--form-->

            <form action="" method="post" enctype="multipath/form-data">

              <!--title-->

              <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title" autocomplete="off" required="required">
              </div>

              <!--description-->

              <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter Product Description" autocomplete="off" required="required">
              </div>


              <!--product keyword-->

              <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keyword" class="form-label">Product keyword</label>
                <input type="text" name="product_keyword" id="product_keyword" class="form-control" placeholder="Enter Product Keyword" autocomplete="off" required="required">
              </div>

              <!--categories-->

              <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                  <option value="">Select a category</option>

                  <?php
                  
                    $select_query="select * from `categories`";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                      $category_title=$row['category_title'];
                      $category_id=$row['category_id'];
                      echo "<option value='$category_id'>$category_title</option>";
                    }
                  ?>

                  <!--<option value="">Categories1</option>
                  <option value="">Categories2</option>
                  <option value="">Categories3</option>
                  <option value="">Categories4</option>
                  <option value="">Categories5</option>
                  <option value="">Categories6</option>
                  <option value="">Categories7</option>
                  <option value="">Categories8</option>-->
                </select>
              </div>

              <!--brands-->

              <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" id="" class="form-select">
                  <option value="">Select a brand</option>


                  <?php
                  
                  $select_query="Select * from `brands`";
                  $result_query=mysqli_query($con,$select_query);
                  while($row=mysqli_fetch_assoc($result_query)){
                    $brand_title=$row['brand_title'];
                    $brand_id=$row['brand_id'];
                    echo "<option value='$brand_title'>$brand_title</option>";
                  }
                ?>



                  <!---<option value="">Brands1</option>
                  <option value="">Brands2</option>
                  <option value="">Brands3</option>
                  <option value="">Brands4</option>
                  <option value="">Brands5</option>
                  <option value="">Brands6</option>
                  <option value="">Brands7</option>
                  <option value="">Brands8</option>-->
                </select>
              </div>

              <!---image1--->

              <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" autocomplete="off" required="required">
              </div>

              <!--image2-->

              <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" autocomplete="off" required="required">
              </div>


              <!--image3-->

              <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" autocomplete="off" required="required">
              </div>

              <!--price-->

              <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price" autocomplete="off" required="required">
              </div>

              <!-- button-->

              <div class="form-outline mb-4 w-50 m-auto">
                <input type="Submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Product">
              </div>
            </form>
      <!--<form action="" method="post" class="mb-2 " style="width:60% ; margin:0px 357px;">
  <div class="form-group w-90 mb-2">
    <label for="productkey">Product Key</label>
    <span class="form-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
    <input type="text" class="form-control form-control-lg mb-3" id="product" name="productkey" aria-lebel="products" aria-describedby="basic-addon1" placeholder="Enter product key">
  </div>
  <div class="form-group">
  <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
  <option selected>Select a categories</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select>
  </div>
  <div class="form-group">
  <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
  <option selected>Select a brands</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select>
  </div>
  <div class="mb-3">
  <label for="formFile" class="form-label">Product Image1</label>
  <input class="form-control" type="file" id="formFile">
</div>
<div class="mb-3">
  <label for="formFile" class="form-label">Product Image2</label>
  <input class="form-control" type="file" id="formFile">
</div>
<div class="mb-3">
  <label for="formFile" class="form-label">Product Image3</label>
  <input class="form-control" type="file" id="formFile">
</div>
<div class="form-group w-90 mb-2">
    <label for="productprice">Product Price</label>
    <span class="form-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
    <input type="text" class="form-control form-control-lg mb-3" name="productprice" aria-lebel="products" aria-describedby="basic-addon1" placeholder="Enter product price">
  </div>
  <div class="form-check">
    <button type="submit" class="btn btn-primary">Insert Product</button>
  </div>
</form>-->
            
<!--<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
<label for="productkey">Product Key</label>
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" 
         name="productkey" placeholder="Enter product key" 
         aria-label="products" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">
 
  <input type="Submit" class="bg-info border-0 p-2 my-3" 
         name="insert_product" value="Insert products" 
         aria-label="Username" aria-describedby="basic-addon1">
         
</div>
</form>-->
        </div>
</body>
</html>