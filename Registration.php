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

?><!DOCTYPE html>

<html>

<head>

<title>HomeBaked</title>

<link rel="stylesheet" href="Registerstyle.css"> <style>

body {

font-family: Arial;

background: url("images/background.jpg") no-repeat center fixed; background-size:cover;

font-size: 17px;

padding: 8px;

}

</style>



</head>

<body >

<div align="center">

<div class="row">

<div class="col-75">

<div class="container">

<form method="post" action="" onsubmit="return validation()">

<div class="row">

<div class="col-50">

<input type="hidden" name="new" value="1"/>

<h1 class="text-white text-center font-weight-bold bg-success" style="font-size: 40px;"> Registration</h1>

<label for="user" class="font-weight-bold"> Username: </label>

<input type="text" name="user" class="form-control" id="user" autocomplete="off"> <span id="username" class="text-danger font-weight-bold"> </span> <label class="font-weight-bold"> Password: </label>

<input type="password" name="pass" class="form-control" id="pass" autocomplete="off">

<span id="passwords" class="text-danger font-weight-bold"> </span> <label class="font-weight-bold"> Confirm Password: </label>

<input type="password" name="conpass" class="form-control" id="conpass" autocomplete="off">

<span id="confrmpass" class="text-danger font-weight-bold"> </span> <label class="font-weight-bold"> Mobile Number: </label>

<input type="text" name="mobile" class="form-control" id="mobileNumber"> <span id="mobileno" class="text-danger font-weight-bold"> </span>

<label class="font-weight-bold"> Email: </label>

<input type="text" name="email" class="form-control" id="emails" autocomplete="off">

<span id="emailids" class="text-danger font-weight-bold"> </span> <input type="submit" value="Submit" class="btn"> <div class="text-center">Already have an account? <a href="loginpage.php">Sign in</a></div>

</form>

</div>

</div>

</div>

</div>

<script type="text/javascript">

function validation(){

var user = document.getElementById('user').value; var pass = document.getElementB yId('pass').value;

var confirmpass = document.getElementById('conpass').value;

var mobileNumber = document.getElementById('mobileNumber').value; var emails = document.getElementById('emails').value;

if(user == ""){

document.getElementById('username').innerHTML =" ** Please fill the username field	**"; return false;

}

if((user.length <= 2) || (user.length > 20)) {

document.getElementById('username').innerHTML =" ** Username lenght must be b etween 2 and 20 **";

return false;

}

if(!isNaN(user)){

document.getElementById('username').innerHTML =" ** only characters are allowed **";

return false;

}

if(pass == ""){

document.getElementById('passwords').innerHTML =" ** Please fill the password fie ld **";

return false;

}

if((pass.length <= 5) || (pass.length > 20)) {

document.getElementById('passwords').innerHTML =" ** Passwords lenght must be between 5 and 20 **";

return false;

}

if(pass!=confirmpass){

document.getElementById('confrmpass').innerHTML =" ** Password does not match the confirm password **";

return false;

}

if(confirmpass == ""){

document.getElementById('confrmpass').innerHTML =" ** Please fill the confirmpas sword field **";

return false;

}

if(mobileNumber == ""){

document.getElementById('mobileno').innerHTML =" ** Please fill the mobile Num ber field **";

return false;

}

if(isNaN(mobileNumber)){

document.getElementById('mobileno').innerHTML =" ** user must write digits only not characters **";

return false;

}

if(mobileNumber.length>10 || mobileNumber.length<10){

document.getElementById('mobileno').innerHTML =" ** Mobile Number must be 10 digits only **";

return false;

}

if(emails == ""){

document.getElementById('emailids').innerHTML =" ** Please fill the email idx` fied	**"; return false;

}

if(emails.indexOf('@') <= 0 ){ document.getElementById('emailids').innerHTML ="
**	@ Invalid Position **"; return false;

}

if((emails.charAt(emails.length-4)!='.') && (emails.charAt(emails.length- 3)!='.')){

document.getElementById('emailids').innerHTML =" ** . Invalid Position **"; return false;

}

}

</script>

</body>

</html>

<?php



if(isset($_POST["new"]) && $_POST["new"]==1)

{

$username = $_REQUEST["user"];

$password = $_REQUEST["pass"];

$confirm_password = $_REQUEST["conpass"];

$mobile_no = $_REQUEST["mobile"];

$email = $_REQUEST["email"];



$sql = "INSERT INTO `registration` (`username`, `password`, `confirm`, `mobile`, `email`) VALUES ('$username','$password','$confirm_password','$mobile_no','$email')";



if ($conn->query($sql) === TRUE) {

echo "<script type='text/javascript'>alert('you are registered successfully');</script> ";

} else {

echo "Error: " . $sql . "<br>" . $conn->error;

}



}

$conn->close();

?>







