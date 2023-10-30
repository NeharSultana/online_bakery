<?php

session_start();

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

<a href="images/bakery-logo.jpg" class="logo"><img src="images/bakery-logo.jpg" alt="company logo" style="width:100px;height:80px;">HomeBaked</a >

</div>

<?php

if(isset($_SESSION["username"])&&(isset($_SESSION["username"])))

{

?>

<ul>

<li><a href="products.php"><i class="fa fa-fw fa-home"></i> Home</a></li>


<li><a href="birthday.php"><i class="fas fa-birthday-cake" aria-hidden="true"></i> Birthday</a></li>

<li><a href="wedding.php"><i class='fas fa-birthday-cake'></i> Wedding</a></li>

<li><a href="cart.php"><i class="fas fa-shopping-cart"></i> Cart</a></li>



<li style="float:right"><a href="logout.php"><i class="fas fa-lock"></i> Log out</a></li>

</ul>

<h4> Welcome to HomeBaked <?php echo $_SESSION["username"]; ?>!!!</h4>

<img src="images/slide1.jpg" alt="company logo" style="width:60%; margin: auto 20%;">

<br>


<br><br><br><br><br><br><br><br><br>

<div class="footer">

<p> &copy; 2020 HomeBaked. </p>

<p><i class="fa fa-fw fa-phone"></i> Contact Us: 8132457887 </p>

<p><i class="fa fa-fw fa-map-marker"></i> Visit Us: No. 7,Rose Garden,<br>Bangalore-560005</p> </div>

<?php

}else{

echo "<hr><br><br><br>";

echo"<div align='center' >
<a class='button' href='loginpage.php' style='margin-left: 90px;margin-right: 220px;padding-left: 200px;padding-right: 200px;background-color:maroon'>
Login Here</a></div>";

}

?>



</body>



</html>
