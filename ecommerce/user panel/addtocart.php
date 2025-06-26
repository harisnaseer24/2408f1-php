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
    $price= (float) $_POST['price'];
$qty= (int)$_POST['qty'];
$total= $price * $qty;

 $checkProduct= "SELECT * from cart where product_id= $productId and user_id=$userId";
    $checkProductResult= mysqli_query($conn,$checkProduct);
    if(mysqli_num_rows($checkProductResult) > 0){
$row =mysqli_fetch_assoc($checkProductResult);
$cartId= $row['cart_id'];
$oldQty= $row['qty'];

$newQty= $oldQty + $qty;//1 + 4
$newTotal= $price * $newQty;

$updateCart= "UPDATE `cart` SET`qty`=$newQty,`total`=$newTotal WHERE cart_id = $cartId";
$updateCartResult= mysqli_query($conn,query: $updateCart);
 if ($updateCartResult) {
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



        //update code
    }else{

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
}


?>