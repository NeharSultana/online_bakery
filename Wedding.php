<?php

$servername = "localhost";

$username = "root";

$password = "";

$dbname = "bakery";



session_start();



// Create connection

$conn = new mysqli($servername, $username, $password, $dbname); // Check connection

if ($conn->connect_error) {

die("Connection failed: " . $conn->connect_error);

}

?>



<html>

<head>

<link rel="stylesheet" href="homestyle.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src='https://kit.fontawesome.com/69911180d5.js' crossorigin='anonymous'></script>

<meta charset="ISO-8859-1">

<title>HomeBaked!!</title>

</head>

<body>



<div class="header">

<a href="images/bakery-logo.jpg" class="logo"><img src="images/bakery-logo.jpg" alt="company logo" style="width:100px;height: 80px;">HomeBaked</a >

</div>

<?php

if(isset($_SESSION["username"])&&(isset($_SESSION["username"])))

{

$userid = $_SESSION["userid"];

?>

<ul>

<li><a href="products.php"><i class="fa fa-fw fa-home"></i> Home</a></li> 
<li><a href="cart.php"><i class="fas fa-shopping-cart"></i> Cart</a></li> 
<li><a href="checkout.php"><i class="fa fa-check"></i> Check Out</a></li>


</ul>

<h4> Explore the delicious tiered wedding cakes!!!</h4>

<br><br><br>

<hr>

<div class="heading">One tier cakes!! </div>

<div class="row">

<hr>

<br>

<form method='post' action=''>

<?php

$sql = "SELECT * FROM products WHERE procategory = 'one-tier'";

$result = $conn->query($sql);



if ($result->num_rows > 0) {

// output data of each row

while($row = $result->fetch_assoc()) {

echo " <form method='post' action=''>

<div class='column'>

<div class = 'card'>

<div class='flip-card'>

<div class='flip-card-inner'>

<div class='flip-card-front'> ";

$img="images/".$row["proimage"];

$proname= $row["proname"];

$prodescription= $row["prodescription"];

$proprice= $row["proprice"];

$procode= $row["procode"];

$procategory= $row["procategory"];

echo "<img src='$img'  alt=".$row["proname"]." style='width:300px;height:300px;'>

</div>

<div class='flip-card-back'>";

echo "<h1>" .$proname."</h1>";

echo "<p>" .$prodescription. "</p>";

echo "<p>" .$proprice. "/-</p>";

echo " </div>

</div>

</div>

<p><label for='qty'>Quantity:</label>

<input type='number' id='qty' name='qty' min='1' max='10' placeholder='1'></p>

<input type='hidden' name='new' value='1'/>

<input type='hidden' name='procode' value=' $procode'/> 
<input type='hidden' name='proprice' value=' $proprice'/>
<input type='hidden' name='procategory' value=' $procategory'/>
<button class='button'>Buy Now</button> </div>


</div>

</form> ";

}

}



?>



</div>

<br><br>

<br><br><br>

<br><br><br>

<hr>

<div class="heading">Two tier cakes!! </div>

<div class="row">

<hr>

<br>

<form method='post' action=''>

<?php

$sql = "SELECT * FROM products WHERE procategory = 'two-tier'";

$result = $conn->query($sql);



if ($result->num_rows > 0) {

// output data of each row

while($row = $result->fetch_assoc()) {

echo " <form method='post' action=''>

<div class='column'>

<div class = 'card'>

<div class='flip-card'>

<div class='flip-card-inner'>

<div class='flip-card-front'> ";

$img="images/".$row["proimage"];

$proname= $row["proname"];

$prodescription= $row["prodescription"];

$proprice= $row["proprice"];

$procode= $row["procode"];

$procategory= $row["procategory"];

echo "<img src='$img'  alt=".$row["proname"]." style='width:300px;height:300px;'>

</div>

<div class='flip-card-back'>";

echo "<h1>" .$proname."</h1>";

echo "<p>" .$prodescription. "</p>";

echo "<p>" .$proprice. "/-</p>";

echo " </div>

</div>

</div>

<p><label for='qty'>Quantity:</label>

<input type='number' id='qty' name='qty' min='1' max='10' placeholder='1'></p>

<input type='hidden' name='new' value='1'/>

<input type='hidden' name='procode' value=' $procode'/> 
<input type='hidden' name='proprice' value=' $proprice'/>
<input type='hidden' name='procategory' value=' $procategory'/>
<button class='button'>Buy Now</button> </div>


</div>

</form> ";

}

}



?>



</div>

<br><br>

<br><br><br>

<br><br><br>


<hr>

<div class="heading">Three tier cakes!! </div>

<div class="row">

<hr>

<br>

<?php

$sql = "SELECT * FROM products WHERE procategory = 'three-tier'"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {

// output data of each row

while($row = $result->fetch_assoc()) {

echo " <form method='post' action=''>

<div class='column'>

<div class = 'card'>

<div class='flip-card'>

<div class='flip-card-inner'>

<div class='flip-card-front'> ";

$img="images/".$row["proimage"];

$proname= $row["proname"];

$prodescription= $row["prodescription"];

$proprice= $row["proprice"];

$procode= $row["procode"];

$procategory= $row["procategory"];

echo "<img src='$img' alt=".$row["proname"]." style='width:300px;height:300px;'>

</div>

<div class='flip-card-back'>";

echo "<h1>" .$proname."</h1>";

echo "<p>" .$prodescription. "</p>";

echo "<p>" .$proprice. "/-</p>";

echo " </div>

</div>

</div>

<p><label for='qty'>Quantity:</label>

<input type='number' id='qty' name='qty' min='1' max='10' placeholder='1'></p>

<input type='hidden' name='new' value='1'/>

<input type='hidden' name='procode' value=' $procode'/>
<input type='hidden' name='proprice' value=' $proprice'/> 
<input type='hidden' name='procategory' value=' $procategory'/> 
<button class='button'>Buy Now</button> </div>


</div>

</form> ";

}

}

else {

?>



</div>

<?php



echo "0 results";

}



if(isset($_POST["new"]) && $_POST["new"]==1)

{

$product_code = $_REQUEST["procode"];

$product_price = $_REQUEST["proprice"];

$product_category = $_REQUEST["procategory"];

$qty = $_REQUEST["qty"];


if($qty==null){

$qty=1;

}



$selectsql = "SELECT * FROM cart WHERE userid='$userid' AND procode='$product_code' ";

$selectresult = $conn->query($selectsql);



if ($selectresult->num_rows >= 1) {

while($selectrow = $selectresult->fetch_assoc()) {

$update = $selectrow["qty"];

}

$qty = $qty+$update;

$updatesql = "UPDATE cart SET qty='$qty' WHERE userid='$userid' AND procode='$product_code'";

if ($conn->query($updatesql) === TRUE) {

echo "<script type='text/javascript'>alert('Product added to cart successfully');</script>";

} else {

echo "Error: " . $sql . "<br>" . $conn->error;

}

}

else{

$sql= "INSERT INTO cart(procode,price,qty,category,userid)VALUES('$product_code','$product_price','$qty','$product_category', '$userid')";



if ($conn->query($sql) === TRUE) {

echo "<script type='text/javascript'>alert('Product added to cart successfully');</script>";

} else {

echo "Error: " . $sql . "<br>" . $conn->error;

}

}






}



$conn->close();

?>



<?php

}else{

echo"<div align='center' >
<a class='button' href='loginpage.php' style='margin-left: 90px;margin-right: 220px;padding-left: 200px;padding-right: 200px;background-color:green'>
Login Here</a></div>";



}

?>



</body>



</html>
