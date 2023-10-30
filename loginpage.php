<?php

$servername = "localhost";

$username = "root";

$password = "";

$dbname = "bakery";



// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);



// Check connection

if ($conn->connect_error) {

die("Connection failed: " . $conn->connect_error);

}

//	Initialize the session 
session_start();

?>

<html>



<head>

<title>Login Page</title>

<link rel="stylesheet" href="registerstyle.css">

<style>

body {

font-family: Arial;

background: url("images/background.jpg") no-repeat center fixed; background-size:cover;

font-size: 17px;

padding: 8px;

}

</style>



</head>



<body>

<div align="center">

<div class="row">

<div class="col-75">

<div class="container">

<form method="post" onsubmit="return validate()">

<div class="row">

<div class="col-50">

<input type="hidden" name="new" value="1"/>

<h1 class="text-white text-center font-weight-bold bg-success" style="font-size: 40px;"> LOGIN</h1>

<label>UserName :</label><input type = "text" name = "username" class = "box" re quired /><br /><br />

<label>Password :</label><input type = "password" name = "password" class = "box " required /><br/><br />

<button class="btn" >Submit</button>

<input type="hidden" value="1" name="login">

<div class="text-center">Don't have an account? <a href="registration.php">Register Here</a></div>

</form>

</div>

</div>

</div>

</div>

<?php

if (isset($_POST["login"]) && ($_POST["login"]==1)){ 
$username = $_REQUEST["username"];
$password = $_REQUEST["password"];

$sql = "SELECT userid, username, password FROM registration WHERE username= '$username'AND password='$password'";

$result = $conn -> query($sql);

if ($result->num_rows>=1) {

while($row = $result->fetch_assoc()) {

$user = $row["username"];

$userid = $row["userid"];

}

echo "<script type='text/javascript'>alert('Logged in successfully');window.location= 'Products.php';</script>";

} else {

echo "<script type='text/javascript'>alert('Invalid Username/Password');window.location='loginpage.php';</script> " ;

}



$_SESSION['username'] = $user;

$_SESSION['userid'] = $userid;

}

$conn -> close();

?>

</body>

</html>
