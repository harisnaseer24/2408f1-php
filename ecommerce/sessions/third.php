<?php 

session_start();
echo "Third page<br>";

echo $_SESSION['email'];
echo $_SESSION['role'];

?>