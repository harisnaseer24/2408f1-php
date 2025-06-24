<?php 
session_start();
if(!isset($_SESSION["role"]) || $_SESSION["role"]!="user"){
echo'
<script>alert("Please login first")
location.href= "./login.php"
</script>
';
}
require_once "../config/config.php";
if(isset($_POST['addtocart'])){

    $userId=$_SESSION['user_id'];
    $productId= $_POST['product_id'];
    $price= $_POST['price'];
    $qty= $_POST['qty'];
    $total= $price * $qty;

    $addtocart="INSERT INTO `cart`(`product_id`, `user_id`, `qty`, `price`, `total`) VALUES ($productId,$userId,$qty,$price,$total)";

    $result=mysqli_query($conn,$addtocart);
    if ($result) {
echo'
<script>alert("Product added to cart successfully")
location.href= "./index.php"
</script>
';
    } else {
        echo'
<script>alert("Failed to add product")
location.href= "./index.php"
</script>
';
    }


}


?>