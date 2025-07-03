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
if(isset($_POST['checkout'])){

 $userId= $_POST['userId'];
 $amount= $_POST['amount'];
 $contact= $_POST['contact'];
 $city= $_POST['city'];
 $address= $_POST['address'];

$checkout="INSERT INTO `orders`(`user_id`, `amount`, `address`, `city`, `contact_no`) VALUES ($userId,$amount,'$address','$city','$contact')";

    $result=mysqli_query($conn,$checkout);
    if ($result) {
echo'
<script>alert("Order Placed successfully")
location.href= "./index.php"
</script>
';
    } else {
        echo'
<script>alert("Failed to place your order")
location.href= "./index.php"
</script>
';
    }

    }

?>