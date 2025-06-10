<?php 

session_start();
 $_SESSION['email']= "haris@gmail.com";
 $_SESSION['role']= "admin";

echo $_SESSION['email'];
echo $_SESSION['role'];



?>