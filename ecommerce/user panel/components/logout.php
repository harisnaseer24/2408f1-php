<?php 
session_start();
session_destroy();


?>

<script>

    alert("Logged out successfully");
    location.href = "../login.php";
    // header("Location:./login.php");
</script>