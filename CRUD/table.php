       <?php 
             include './database/config.php';
             include './components/header.php';
             ?>
       
        <main>
          <div class="container my-3">
            <marquee>
            <h2 class="display-1 text-dark">Our Latest Collection</h2></marquee>
     <table class="table table-responsive table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">Product Id</th>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Stock</th>
      <th scope="col">Price</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
<?php 
   $query="SELECT * FROM `products`";
             $result= mysqli_query($conn,$query);
             if($result){
                while($row= mysqli_fetch_assoc($result)){
                    $image=$row["image"];
                    $id=$row["product_id"];
                    echo '<tr>
      <th scope="row">'.$row["product_id"].'</th>
      <td><img class="rounded-circle" height="50" src="./uploads/'.$image.'" alt=""></td>
      <td>'.$row["title"].'</td>
      <td>'.$row["description"].'</td>
      <td>'.$row["stock"].' Units</td>
      <td>Rs. '.$row["price"].'</td>
      <td>
       <a class="btn btn-info btn-sm">Edit</a>
      <a class="btn btn-info btn-sm" href="deleteproduct.php?id='.$id.'">Delete</a>
      </td>
   
    </tr>
                   ';
}
             }else{
                echo "Error";
             }
?>
           
      </tbody>
</table>
          </div>

        </main>
       <!-- footer -->
         <?php 
             
             include './components/footer.php';
             ?>
      
