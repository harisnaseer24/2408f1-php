<?php 
include_once "./components/header.php";
if(!isset($_SESSION["role"]) || $_SESSION["role"]!="user"){
echo'
<script>alert("Please login first")
location.href= "./login.php"
</script>
';
}
require_once "../config/config.php";
$userId=$_SESSION["user_id"];
$grandTotal=0;

?>
<div class="container my-5">
<div class="row">
    <div class="col-lg-8">
 <h2>Cart Items</h2>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Title</th>
      <th scope="col">Image</th>
      <th scope="col">Qty</th>
      <th scope="col">Price</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $getCartItems= "SELECT * FROM `cart` as c 
INNER JOIN `products` as p
ON c.product_id= p.product_id where c.user_id= $userId;";
  $getCartItemsResult= mysqli_query($conn,$getCartItems);

  if(mysqli_num_rows($getCartItemsResult) > 0)
{
    while($row= mysqli_fetch_assoc($getCartItemsResult)){
        $image= $row["image"];
        $grandTotal += $row['total'];
        echo '
         <tr>
      <th scope="row">'.$row["cart_id"].'</th>
      <td>'.$row["title"].'</td>
      <td><img src="../admin panel/uploads/'.$image.'" class="rounded-circle" height=45 /></td>
      <td>'.$row["qty"].'</td>
      <td>'.$row["price"].'</td>
      <td>'.$row["total"].'</td>
      <td>  X   </td>
      
    </tr>
        ';

    }

}else{

    echo '
     <tr>
      Please add something to cart first.
    </tr>
    ';
}
  ?>
  </tbody>
</table>
    </div>
    <div class="col-lg-4">       
<div class="container">
    <h2>Cart Summary:</h2>
    <p>Total : Rs. <?=$grandTotal?></p>
    <p>Delivery Charges : Rs. 150</p>
    <h3>Subtotal: Rs. <?php echo $grandTotal+150 ?></h3>
    <button class="btn btn-danger">Proceed to Checkout</button>
</div>
    </div>
</div>
</div>

<?php 
include_once "./components/footer.php";
?>