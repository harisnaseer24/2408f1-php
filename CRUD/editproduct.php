<?php 
require "./database/config.php";
if(isset($_GET['id'])){
$id = $_GET['id'];
$getQuery= "SELECT * From `products` WHERE product_id=$id";
$result= mysqli_query($conn,$getQuery);
if($result){
      $row = mysqli_fetch_assoc($result);
      $image = $row['image'];
      $title = $row['title'];
      $price = $row['price'];
      $description = $row['description'];
      $stock = $row['stock'];
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
            <main class="container">
  <form action="processedit.php" method="post" enctype="multipart/form-data">
            
            <h1>Edit product details</h1>
  <div class="mb-3">
    <label for="title" class="form-label">Poduct title</label>
    <input type="hidden" class="form-control" name="id" value="<?= $id?>" >
    <input type="text" class="form-control" name="title" value="<?= $title?>" >

  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Poduct description</label>
    <input type="text" class="form-control" name="description" value="<?= $description?>" >

  </div>
  <div class="mb-3">
    <label for="price" class="form-label">Poduct price</label>
    <input type="number" class="form-control" name="price" value="<?= $price?>">
  </div>
  <div class="mb-3">
    <label for="stock" class="form-label">Poduct stock</label>
    <input type="number" class="form-control" name="stock" value="<?= $stock?>">

  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Poduct image</label>
    <img src="./uploads/<?php echo $image?>" alt="" width="300">
    <input type="file" class="form-control" name="image" >

  </div>

  <!-- <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <button type="submit" name="editproduct" class="btn btn-primary">Edit product</button>
</form>



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
     
      
      
      
      
      
      <?php
}else{
       echo '<script>
    alert("Failed to delete the product");
    window.location.href="./table.php"
</script>';
}
echo $id;
}
else{
    echo '<script>
    alert("product id not found");
    window.location.href="./table.php"
</script>';
}
?>
