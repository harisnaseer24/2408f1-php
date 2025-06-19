
<?php 
if(isset($_GET["id"])){
$id = $_GET['id'];
include_once "./components/header.php";

$getQuery= "SELECT * From `products` WHERE product_id=$id";
$result= mysqli_query($conn,$getQuery);
if($result){
      $row = mysqli_fetch_assoc($result);
      $image = $row['image'];
      $title = $row['title'];
      $price = $row['price'];
      $description = $row['description'];
      $stock = $row['stock'];
      $cat_id = $row['cat_id']


?>




        <div class="container">
          <div class="page-inner">
           
            <form action="processedit.php" enctype="multipart/form-data" method="post">
                <div class="form-group">
                    <input type="hidden" name="product_id" value="<?=$id?>">
                          <label for="title">Product title</label>
                          <input
                          value="<?=$title?>"
                            type="text"
                            class="form-control"
                            name="title"
                            placeholder="Enter title"
                          />
                        
                        </div>
                <div class="form-group">
                          <label for="description">Product description</label>
                          <input
                          value="<?=$description?>"
                            type="text"
                            class="form-control"
                            name="description"
                            placeholder="Enter description"
                          />
                        
                        </div>
                <div class="form-group">
                          <label for="price">Product price</label>
                          <input
                          value="<?=$price?>"
                            type="number"
                            class="form-control"
                            name="price"
                            placeholder="Enter price"
                          />
                        
                        </div>
                <div class="form-group">
                          <label for="stock">Product stock</label>
                          <input
                          value="<?=$stock?>"
                            type="number"
                            class="form-control"
                            name="stock"
                            placeholder="Enter stock"
                          />
                            
                        </div>
                          <div class="form-group">
                          <label for="defaultSelect">Select Category</label>
                          <select
                            class="form-select form-control"
                            id="defaultSelect" name="cat_id"
                            >
                            <option disabled>Choose category</option>
                            <?php 
                            $getCategories= "SELECT * FROM categories";
                            $result = mysqli_query($conn,$getCategories);
                            if(mysqli_num_rows($result) > 0){
                             while($row= mysqli_fetch_assoc($result)) {

                                 echo "<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
                             }  
                            }
                            
                            ?>
                         
                            
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="image"
                            >Product image</label
                          >
                          <input

                            type="file"
                            class="form-control-file"
                            id="exampleFormControlFile1"
                            name="image"
                          />
                        </div>
                         <div class="card-action">
                    <button class="btn btn-success" type="submit" name="editproduct">Edit product</button>
                    <button class="btn btn-danger">Cancel</button>
                  </div>
            </form>

           
          </div>
        </div>
 <?php 
}
     include_once "./components/footer.php";
                        }



else{
    header("Location: products.php");
}

     ?>