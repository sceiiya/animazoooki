<?php

include('important/class.product.php');

$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// retrieve product information from the database
$id = $_GET['id']; // get the ID parameter from the query string

$sql = "SELECT name, price, image FROM products WHERE id = " . $id;
$result = $conn->query($sql);

$product = array();

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  // add product info to the array
  $product = array(
    "name" => $row["name"],
    "price" => $row["price"],
    "image" => $row["image"]
  );
}

// return product information as JSON data
header('Content-Type: application/json');
echo json_encode($product);

// close database connection
$conn->close();

?>