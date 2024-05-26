<?php
include 'includes/db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Commerce Landing Page</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    .navbar-brand img {
      height: 40px;
    }

    .cart-icon {
      display: flex;
      align-items: center;
    }

    .cart-badge {
      background-color: red;
      color: white;
      border-radius: 50%;
      padding: 2px 6px;
      margin-left: 5px;
      font-size: 12px;
    }

    .product-card {
      transition: transform .2s;
    }

    .product-card:hover {
      transform: scale(1.05);
    }

    .product-image {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .product-card {
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .product-card:hover {
      transform: scale(1.05);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .product-image {
      height: 200px;
      object-fit: cover;
    }

    .add-to-cart i {
      margin-right: 5px;
    }

    .toast-container {
      position: fixed;
      top: 20px;
      right: 20px;
      z-index: 1080;
    }
    .card-title a{
      text-decoration: none;
      color: black;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
      E-Commerce Duka
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pos.php">POS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="orders.php">Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add_product.php">Add Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="products.php">Products List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <div class="cart-icon">
              <i class="fas fa-shopping-cart"></i>
              <span class="cart-badge" id="cart-count">0</span>
            </div>
          </a>
        </li>

      </ul>
    </div>
  </nav>

  <?php include "includes/alerts.php"; ?>