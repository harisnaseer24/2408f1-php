<?php 
//superglobals 7 (assosiative arrays)
$_GET;
$_POST;

// $_REQUEST;
// $_SERVER;
// $_FILES;
// $_SESSION;
// $_COOKIE;
// $_ENV;

if( isset($_POST['login'])){
     echo "this is post method";
echo $_POST['email'];
echo $_POST['password'];
}

if( isset($_GET['login'])){
    echo "this is get method";
echo $_GET['email'];
echo $_GET['password'];
}

if( isset($_REQUEST['login'])){
    echo "this is request method <br>";
echo $_REQUEST['email'];
echo $_REQUEST['password'];
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login now</h1>
<form action="result.php" method="post">
    <input type="email" name="email" id="" placeholder="Enter your email" required>
    <br>
    <input type="password" name="password" id="" placeholder="Enter your password" required minlength="5" maxlength="10">
    <br>
<input type="submit" value="Login" name="login">
</form>


</body>
</html>

product title;
price;
description;
qty;
isAvailable