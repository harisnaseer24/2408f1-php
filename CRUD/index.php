       <?php 
             include './database/config.php';
             include './components/header.php';
             ?>
       
        <main>
          <div class="container my-3">
            <marquee>
            <h2 class="display-1 text-dark">Our Latest Collection</h2></marquee>
        <div class="row">

<?php 
   $query="SELECT * FROM `products`";
             $result= mysqli_query($conn,$query);
             if($result){
                while($row= mysqli_fetch_assoc($result)){
                    echo '
                     <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card" >
  <img src="./uploads/'.$row["image"].'" class="card-img-top" alt="..." height="350">
  <div class="card-body">
    <h5 class="card-title">'.$row["title"].'</h5>
    <p class="card-text">'.$row["description"].'.</p>
    <a href="#" class="btn btn-primary"> Rs. '.$row["price"].'</a>
  </div>
</div>
  </div>';
}
             }else{
                echo "Error";
             }
?>
           
        </div>
          </div>

        </main>
       <!-- footer -->
         <?php 
             
             include './components/footer.php';
             ?>
      
