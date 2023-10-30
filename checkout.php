<?php

$servername = "localhost";

$username = "root";

$password = "";

$dbname = "bakery";



$grandtotal = 0;



session_start();

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname); // Check connection

if ($conn->connect_error) {

die("Connection failed: " . $conn->connect_error);

}



?>



<html>

<head>

<link rel="stylesheet" href="checkstyles.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<meta charset="ISO-8859-1">
 <title>HomeBaked!!</title>
<style>

body {

font-family: Arial;

background: url("images/background.jpg") no-repeat center fixed; background-size:cover;

font-size: 17px;

padding: 8px;

}

</style>

<script>
 $(document).ready(function() {
 $("#sub_form").validate({
 rules: {
 name : {
 required: true,
 minlength: 3
 },
 email: {
 required: true,
 email: true
 },
 mobile: {
 required: true,
 number: true,
 minlength: 10
 },
 address : {
 required: true,
 minlength: 3
 },
 zip: {
 required: true,
 number: true,
 minlength: 6
 },
 terms:{
 required:true
 }
},
messages:
 {
 name: {
 required: "Please enter your name",
 minlength: "Name should be at least 3 characters"
 },
 email: {
 required: "Please enter your email id",
 email: "The email should be in the format: abc@domain.tld"
 },
 mobile: {
 required: "Please enter your mobile number",
 number: "Please enter a valid phone number",
 minlength: "Phone number should be of length exactly 10"
 },
 address: {
 required: "Please enter your address",
 minlength: "Please enter a valid address"
 },
 zip: {
 required: "Please enter your area zip code",
 number: "Please enter a valid zip code",
 minlength: "zip code should be of length exactly 6"
 },
 terms:{
 required: "Please accept the terms and conditions",
 }
 }
});
$(':text:first').focus();
 });
 </script>




<style>

.error {

color: red;

}

</style>



</head>



<body>



<div class="header">

<a href="products.php" class="logo"><img src="images/bakery-logo.jpg" alt="company logo" style="width:100px;height:80px;">HomeBaked</a >

</div>

<?php

if(isset($_SESSION["username"])&&(isset($_SESSION["username"])))

{

$userid = $_SESSION["userid"];

?>

<hr>

<h4 style="color:white;"> Checkout now to enjoy our delicacies!!!</h4>

<br>

<br>

<div align="center">



<div class="row">

<div class="col-25">

<div class="container">

<?php



$sql = "SELECT * FROM cart WHERE userid='$userid'"; 
$result = $conn->query($sql);


if ($result->num_rows > 0) {



echo "<h4>Cart <span class='price' style='color:black'><i class='fa fa-shopping-cart'></i> </span></h4>";

while($row = $result->fetch_assoc()) {

$procode = $row["procode"];

$price = $row["price"];

$qty = $row["qty"];

$prosql = "SELECT proname FROM products WHERE procode='$row[procode]'";

$proresult = $conn->query($prosql);

if ($proresult->num_rows > 0) {

while($prorow = $proresult->fetch_assoc()) {

$proname = $prorow["proname"];

}

}






echo "<p>".$proname." <span class='price'>Rs.".$price*$qty."</span></p>"; 
$grandtotal = $grandtotal + ($price*$qty); }




echo "<hr>";

echo "<p>Total <span class='price' style='color:black'><b>Rs.".$grandtotal."</b> </span></p>";

echo "</div>";



?>

</div>

</div>

<br><br><br>



<div class="row">

<div class="col-75">

<div class="container">

<form id="sub_form" method="post" action="">



<div class="row">

<div class="col-50">



<h1 style="font-size:25px">Checkout Form</h1>

<label for="name"><i class="fa fa-user"></i> Name: <span  style="color:red"> *</span></label>

<input type="text" id="name" name="name" placeholder="Enter your Name" autocomplete="off">



<label for="email"><i class="fa fa-envelope"></i> Email id: <span style="color:red"> *</span></label>

<input type="text" id="email" name="email" placeholder="Enter the email id" autocomplete="off">



<label for="mobileno"><i class="fa fa-phone"></i> Mobile Number: <span style="color:red"> *</span></label>

<input type="text" id="mobile" name="mobile" placeholder="Enter the mobile number" autocomplete="off">



<label for="address"><i class="fa fa-address-card-o"></i> Address: <span style="color:red"> *</span></label>

<input type="text" id="address" name="address" placeholder="Enter the addres s" autocomplete="off">


<label for="zip">Zip<span  style="color:red"> *</span></label>

<input type="text" id="zip" name="zip" placeholder="Enter 6 digit zip code">

<label for="tc">Cash on Delivery <span  style="color:red"> *</span></label>

<label for="terms" ><input type="checkbox" name="terms" id="terms" value ="agree">Only cash on delivery is accepted. </label>

<input type="submit" name="submit" value="Submit" class="btn"> <!-- onclick="function()"-->

</form>

</div>
</div>

</div>

</div>



<?php



if (isset($_POST["submit"])){

$name = $_REQUEST["name"];

$address = $_REQUEST["address"];

$phno = $_REQUEST["mobile"];

$email = $_REQUEST["email"];

$zip = $_REQUEST["zip"];

$date = date("Y/m/d");



$sql = "INSERT INTO bill(userid,name,address,zip,phone, email,total,date)VALUES ('$userid','$name','$address','$zip','$phno', '$email','$grandtotal','$date')";



if ($conn->query($sql) === TRUE) {

$deletesql = "DELETE FROM cart WHERE userid='$userid'"; 
$conn->query($deletesql);

echo "<script type='text/javascript'>alert('Order Placed successfully');window.location='cart.php';</script>";

} else {

echo "Error: " . $sql . "<br>" . $conn->error;

}

}

}

else {

echo "<div align='center'><img src='images/bakery-logo.jpg' ><div>

<h4> Your Cart is empty explore our delicacies now!!!</h4>";

}



$conn->close();

?>

<?php

}else{

echo"<br><br><hr><br><br><br><div align='center' ><a class='button' href='login page.php' style=' text-decoration:none; color:white; 90px;padding-left: 200px;padding-right: 200px;background-color:maroon;padding-top: 20px;padding-bottom: 20px;'>Login Here</a></div>";



}

?>



</body>

</html>