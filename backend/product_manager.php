<?php
include '../includes/db.php';

//ADD PRODUCT
if (isset($_POST['addproduct'])) {
  $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
  $productPrice = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_INT);

  // Get image details and define the target directory
  $image = $_FILES['image']['name'];
  $targetDir = "../productimage/";

  // Rename the image to avoid duplicates by adding a timestamp
  $imageExtension = pathinfo($image, PATHINFO_EXTENSION);
  $newImageName = time() . '_' . uniqid() . '.' . $imageExtension;
  $targetFile = $targetDir . $newImageName;

  // Generate a unique product ID
  $product_id = uniqid();

  // Insert product details into the database
  $addProduct = mysqli_query($db, "INSERT INTO products (product_id, title, price, image) VALUES ('$product_id', '$title', '$productPrice', '$newImageName')");

  if ($addProduct) {
      // Move the uploaded file to the target directory with the new name
      if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
          echo "<script>window.location.href='../products.php?success=Product added successfully';</script>";
      } else {
          echo "<script>window.location.href='../add_product.php?error=Failed to move uploaded file';</script>";
      }
  } else {
      echo "<script>window.location.href='../add_product.php?error=Failed to add product';</script>";
  }
}


//DELETE PRODUCT
if (isset($_GET['deleteproduct']))
{
  $product_id = $_GET['deleteproduct'];
  $getProduct = mysqli_query($db, "SELECT * FROM products WHERE product_id = '$product_id'");
  $product = mysqli_fetch_assoc($getProduct);
  $deleteProduct = mysqli_query($db, "DELETE FROM products WHERE product_id = '$product_id'");
  if ($deleteProduct)
  {
    unlink("../productimage/" . $product['image']);
    echo "<script>window.location.href='../products.php?success=Product deleted successfully';</script>";
  }
  else
  {
    echo "<script>window.location.href='../products.php?error=Failed to delete product';</script>";
  }
}


//EDIT PRODUCT
if (isset($_POST['editproduct'])) {
  $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
  $productPrice = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_INT);
  $product_id = filter_input(INPUT_POST, 'product_id', FILTER_SANITIZE_STRING);
  
  // Get product details from the database
  $getProduct = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM products WHERE product_id = '$product_id'"));
  
  // Handle image upload if a new image is provided
  if ($_FILES['image']['name']) {
      $image = $_FILES['image']['name'];
      $imageExtension = pathinfo($image, PATHINFO_EXTENSION);
      $newImageName = time() . '_' . uniqid() . '.' . $imageExtension;
      $targetFile = "../productimage/" . $newImageName;

      // Update product details in the database including the new image name
      $editProduct = mysqli_query($db, "UPDATE products SET title = '$title', price = '$productPrice', image = '$newImageName' WHERE product_id = '$product_id'");

      if ($editProduct) {
          // Delete the old image if it exists
          if (file_exists("../productimage/" . $getProduct['image'])) {
              unlink("../productimage/" . $getProduct['image']);
          }
          // Move the new image to the target directory
          move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
          echo "<script>window.location.href='../products.php?success=Product updated successfully';</script>";
      } else {
          echo "<script>window.location.href='../edit_product.php?error=Failed to update product';</script>";
      }
  } else {
      // Update product details without changing the image
      $editProduct = mysqli_query($db, "UPDATE products SET title = '$title', price = '$productPrice' WHERE product_id = '$product_id'");
      
      if ($editProduct) {
          echo "<script>window.location.href='../products.php?success=Product updated successfully';</script>";
      } else {
          echo "<script>window.location.href='../edit_product.php?error=Failed to update product';</script>";
      }
  }
}
