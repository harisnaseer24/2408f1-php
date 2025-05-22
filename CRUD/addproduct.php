<?php 
require ("./database/config.php");
if(isset($_POST['addproduct'])){
    $title= $_POST['title'];
    $description= $_POST['description'];
    $price= $_POST['price'];
    $stock= $_POST['stock'];
    $validExtensions= ["jpg", "jpeg", "jfif","png", "webp"];
    $imageName= $_FILES['image']['name'];

    $extension= explode('.',$imageName)[1];//on.png ==> ["on", "png"]
    echo $extension;

    if($_FILES['image']['error']==4){
        echo "<script>alert('Please select image first')</script>";
    }
   else if ($_FILES['image']['size'] > 2000000){
 echo "<script>alert('File is too large')</script>";
   }
   else if (!in_array($extension, $validExtensions)){
 echo "<script>alert('Invalid File format')</script>";
   }
   else{

    $query="INSERT INTO `products`( `title`, `description`, `image`, `price`, `stock`) VALUES ('$title','$description','$imageName',$price,$stock)";

    $result= mysqli_query($conn,$query);
    if($result){
          move_uploaded_file($_FILES['image']['tmp_name'],"uploads/".$imageName);
         echo "<script>alert('Product added succesfully')</script>";
        }
        else{
        echo "<script>alert('Failed to add product')</script>";
    }
   }
}
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>

<div class="container my-2">
  
    <form action="#" method="post" enctype="multipart/form-data">
            
            <h1>Enter product details</h1>
  <div class="mb-3">
    <label for="title" class="form-label">Poduct title</label>
    <input type="text" class="form-control" name="title" >

  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Poduct description</label>
    <input type="text" class="form-control" name="description" >

  </div>
  <div class="mb-3">
    <label for="price" class="form-label">Poduct price</label>
    <input type="number" class="form-control" name="price">

  </div>
  <div class="mb-3">
    <label for="stock" class="form-label">Poduct stock</label>
    <input type="number" class="form-control" name="stock" >

  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Poduct image</label>
    <input type="file" class="form-control" name="image" >

  </div>

  <!-- <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <button type="submit" name="addproduct" class="btn btn-primary">Add product</button>
</form>
  </div>
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
