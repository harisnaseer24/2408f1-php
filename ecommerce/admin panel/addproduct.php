<?php 
include_once "./components/header.php";

if(isset($_POST['addproduct'])){
    $title= $_POST['title'];
    $description= $_POST['description'];
    $price= $_POST['price'];
    $stock= $_POST['stock'];
    $cat_id= $_POST['cat_id'];
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

    $query="INSERT INTO `products`( `title`, `description`, `image`, `price`, `stock`,`cat_id`) VALUES ('$title','$description','$imageName',$price,$stock,$cat_id)";

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

        <div class="container">
          <div class="page-inner">
           
            <form action="" enctype="multipart/form-data" method="post">
                <div class="form-group">
                          <label for="title">Product title</label>
                          <input
                            type="text"
                            class="form-control"
                            name="title"
                            placeholder="Enter title"
                          />
                        
                        </div>
                <div class="form-group">
                          <label for="description">Product description</label>
                          <input
                            type="text"
                            class="form-control"
                            name="description"
                            placeholder="Enter description"
                          />
                        
                        </div>
                <div class="form-group">
                          <label for="price">Product price</label>
                          <input
                            type="number"
                            class="form-control"
                            name="price"
                            placeholder="Enter price"
                          />
                        
                        </div>
                <div class="form-group">
                          <label for="stock">Product stock</label>
                          <input
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
                    <button class="btn btn-success" type="submit" name="addproduct">Add product</button>
                    <button class="btn btn-danger">Cancel</button>
                  </div>
            </form>

           
          </div>
        </div>
 <?php 
     include_once "./components/footer.php";
     
     ?>