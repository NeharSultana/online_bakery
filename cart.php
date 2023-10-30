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

<link rel="stylesheet" href="cartstyle.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src='https://kit.fontawesome.com/69911180d5.js' crossorigin='anonymous'></script>

<meta charset="ISO-8859-1">

<title>HomeBaked!!</title>

</head>

<body>



<div class="header">

<a href="images/bakery-logo.jpg" class="logo"><img src="images/bakery-logo.jpg" alt="company logo" style="width:100px;height:80px;">HomeBaked</a >

</div>



<?php

if(isset($_SESSION["username"])&&(isset($_SESSION["username"])))

{

$userid = $_SESSION["userid"];

?>

<ul>

<li><a href="products.php"><i class="fa fa-fw fa-home"></i> Home</a></li> <li><a href="cart.php"><i class="fas fa-shopping-cart"></i> Cart</a></li> <li><a href="checkout.php"><i class="fa fa-check"></i> Check Out</a></li>


</ul>

<form method="post" action="">

<h4> View your Cart!!!</h4>

<br><br><br>



<table id="products" align="center">



<?php

$sql = "SELECT * FROM cart WHERE userid='$userid'";

$result = $conn->query($sql);



if ($result->num_rows > 0) {



echo "<tr>

<th>Product Image</th>

<th>Product Name</th>

<th>Product Price</th>

<th>Qty</th>

<th>Total</th>

<th>Delete</th>



</tr>";

// output data of each row

while($row = $result->fetch_assoc()) {

$imgsql = "SELECT proname,proimage FROM products WHERE procode='".$row["procode"]."'";

$imgresult = $conn->query($imgsql);

if ($imgresult->num_rows > 0) {

while($imgrow = $imgresult->fetch_assoc()) {

$proname = $imgrow["proname"];

$img="images/".$imgrow["proimage"];

}

}



echo "<tr>";

echo "<td><img src='".$img."' style='width:100px;height:100px;'></td>";

echo "<td>".$proname."</td>";

echo "<td>" . $row["price"]. "</td>";

echo "<td>" . $row["qty"]. "</td>";

echo "<td>" . $row["price"]*$row["qty"]. "</td>";

echo "<td> <a href='productdelete.php?id=$row[procode]' class='button'>Delete</a ></td>";
$grandtotal = $grandtotal + $row["price"]*$row["qty"];
echo "</tr>";

}

echo "<tr style='background-color: #FCE205; color:black;'>";

echo "<td colspan='4'>Total</td>";

echo "<td>".$grandtotal."</td>";
echo "<td> </td>";
echo "</tr>";

echo"</table>";

echo"<br><br><input type='submit' name='empty' value='Empty Cart' class='button' style='margin-left: 120px;padding-left: 200px;padding-right: 200px;background-color:red'>";

echo"<a class='button' href='checkout.php' style='margin-left: 90px;margin-right: 120px;padding-left: 200px;padding-right: 200px;background-color:green'>Checkout</a>";



}

else {

?>





<?php



echo "<div align='center'><img src='images/bakery-logo.jpg' ><div>

<h4> Your Cart is empty explore our delicacies now!!!</h4>";


}



if (isset($_POST["empty"])){



$deletesql = "DELETE FROM cart WHERE userid='$userid'";

if ($conn->query($deletesql) === TRUE) {

echo "<script type='text/javascript'>alert('Cart emptied successfully');location='cart.php';</script>";

} else {

echo "Error: " . $sql . "<br>" . $conn->error;

}



}



$conn->close();

?>

</form>



<?php

}else{

echo"<div align='center' >
<a class='button' href='loginpage.php' style='margin-left: 90px;margin-right: 220px;padding-left: 200px;padding-right: 200px;background-color:green'>
Login Here</a></div>";

}

?>

</body>

</html>
