<?php 
require "./database/config.php";
if(isset($_GET['id'])){
$id = $_GET['id'];
$deleteQuery= "DELETE From `products` WHERE product_id=$id";
$result= mysqli_query($conn,$deleteQuery);
if($result){
       echo '<script>
    alert("Product deleted successfully");
    window.location.href="./table.php"
</script>';
}else{
       echo '<script>
    alert("Failed to delete the product");
    window.location.href="./table.php"
</script>';
}
echo $id;
}
else{
    echo '<script>
    alert("Failed to delete the product");
    window.location.href="./table.php"
</script>';
}
?>
