<?php 

$host="localhost";
$username="root";
$dbpassword="";
$dbname="2408F1-PHP";

$conn= mysqli_connect($host, $username, $dbpassword, $dbname);

if($conn){
    echo "Connection successful";
}else{
    echo "Connection failed";
    die("Connection failed: " . mysqli_connect_error());

}



?>