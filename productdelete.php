<?php

$servername = "localhost";

$username = "root";

$password = "";

$dbname = "bakery";



// Create connection

$conn = new mysqli($servername, $username, $password, $dbname); // Check connection

if ($conn->connect_error) {

die("Connection failed: " . $conn->connect_error);

}

$id = $_GET["id"];

$sql = "DELETE FROM cart WHERE procode='$id'"; if ($conn->query($sql) === TRUE) {

echo "<script type='text/javascript'>alert('Producted removed from cart successfully' );window.location='cart.php';</script>";

} else {

echo "Error: " . $sql . "<br>" . $conn->error;

}



?>
