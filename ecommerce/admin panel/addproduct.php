<?php 
include_once "./components/header.php"
?>

        <div class="container">
          <div class="page-inner">
           
            <form action="">
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
                            id="defaultSelect" name="catId"
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