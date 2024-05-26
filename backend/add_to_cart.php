<?php
include '../includes/db.php';

$response = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $productId = $_POST['productId'];
  $checkProduct = mysqli_query($db, "SELECT * FROM products WHERE product_id = '$productId'");
  if (mysqli_num_rows($checkProduct) <= 0) {
    $response = [
      'status' => 0,
      'message' => 'Product not found'
    ];
    echo json_encode($response);
    exit();
  }
  $checkCart = mysqli_query($db, "SELECT * FROM cart_items WHERE product_id = '$productId'");
  if (mysqli_num_rows($checkCart) > 0) {
    //ADD THE QUANTITY OF THE PRODUCT
    $addQuantity = mysqli_query($db, "UPDATE cart_items SET quantity = quantity + 1 WHERE product_id = '$productId'");
  } else {
    //ADD THE PRODUCT TO THE CART
    $addProduct = mysqli_query($db, "INSERT INTO cart_items (product_id, quantity) VALUES ('$productId', 1)");
  }
  //COUNT THE NUMBER OF ITEMS IN THE CART
  $num_items_query = mysqli_query($db, "SELECT COUNT(*) as num_items FROM cart_items");
  $num_items_row = mysqli_fetch_assoc($num_items_query);
  $num_items = $num_items_row['num_items'];
  $response = [
    'status' => 1,
    'message' => 'Product added ' . $productId . ' to cart successfully',
    'num_items' => $num_items
  ];
} else {
  $response = [
    'status' => 0,
    'message' => 'invalid request method the request must be POST'
  ];
}
header('Content-Type: application/json');
echo json_encode($response);
