<?php 

session_start();
if(!isset($_SESSION["role"]) || $_SESSION["role"]!="admin"){
  header("Location: ../user panel/login.php");
}
require_once "../config/config.php";

if(isset($_POST['editproduct'])){
    $id= $_POST['product_id'];
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

    $query="UPDATE `products` SET `title`= '$title', `description`= '$description', `image`='$imageName', `price`= $price, `stock`=$stock,`cat_id` = $cat_id  where product_id =$id ";

    $result= mysqli_query($conn,$query);
    if($result){
          move_uploaded_file($_FILES['image']['tmp_name'],"uploads/".$imageName);
         echo "<script>alert('Product Updated succesfully')
         
         location.href='products.php'
         
         </script>";
        }
        else{
        echo "<script>alert('Failed to update product')
         location.href='products.php'
         </script>";
    }
   }
}

?>