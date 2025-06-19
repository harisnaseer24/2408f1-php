<?php 
session_start();
if(!isset($_SESSION["role"]) || $_SESSION["role"]!="admin"){
  header("Location: ../user panel/login.php");
}
require_once "../config/config.php";

if(isset($_GET["id"])){

    $id=$_GET["id"];

    $deleteProduct= "DELETE FROM products where product_id=$id";
    $result = mysqli_query($conn,$deleteProduct);
    if($result){
        echo "<script>alert('Product deleted successfully')
        location.href = 'products.php'
        </script>";

    }else{
         echo "<script>alert('Failed to delete product')
        location.href = 'products.php'
        </script>";

    }



}else{
    header("Location: products.php");
}


?>