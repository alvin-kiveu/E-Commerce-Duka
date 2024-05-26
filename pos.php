<?php include "header.php"; ?>
<style>
  .product-card {
    box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
  }


  .product-card .product-image {
    max-height: 150px;
    /* Adjust the height as needed */
  }

  .product-card .product-image {
    position: relative;
  }

  .product-card .product-image::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    /* Adjust the opacity as needed */
    opacity: 0;
    transition: opacity 0.3s ease;
  }

  .product-card:hover .product-image::before {
    opacity: 1;
  }

  .product-card .card-body {
    position: relative;
    z-index: 1;
  }

  .product-holder {
    overflow: auto;
    max-height: 300px;
  }

  .added-products {
    overflow: auto;
    max-height: 300px;
  }

  .added-products table {
    margin-top: 20px;
  }

  .added-products table thead {
    background-color: #f8f9fa;
  }

  .added-products table thead th {
    font-weight: bold;
  }

  .added-products table tbody tr td {
    vertical-align: middle;
  }

  .added-products table tbody tr td img {
    max-width: 50px;
    max-height: 50px;
  }

  .card-title {
    font-size: 1.2rem;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
</style>

<div class="container mt-5">
  <div class="row">
    <div class="col-md-12">
      <div class="alert alert-info">
        <h4>Point of Sale</h4>
        <p>Use the search bar to find products and add them to the cart. You can then proceed to checkout.</p>
      </div>
    </div>


    <div class="col-md-8">
      <div class="row">
        <h4>Point of Sale</h4>
        <div class="col-md-12 mb-3">
          <form action="" method="GET">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for products..." name="search">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i> Search</button>
              </div>
            </div>
          </form>
        </div>

        <div class="card col-md-12 mb-3">
          <div class="card-body row product-holder">
            <?php
            // Search Query
            $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

            // Fetch Products
            $query = "SELECT * FROM products";
            if (!empty($searchQuery)) {
              $query .= " WHERE title LIKE '%$searchQuery%'";
            }
            $query .= " ORDER BY id DESC";

            $getProducts = mysqli_query($db, $query);

            if (mysqli_num_rows($getProducts) > 0) {
              while ($product = mysqli_fetch_array($getProducts)) {
            ?>
                <div class="col-md-4">
                  <div class="card mb-4 product-card">
                    <img src="productimage/<?php echo $product['image']; ?>" class="card-img-top product-image" alt="Product Image">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $product['title']; ?></h5>
                      <h6>Ksh <?php echo $product['price']; ?></h6>
                      <button class="btn btn-primary add-to-cart" data-product-id="<?php echo $product['product_id']; ?>">
                        <i class="fas fa-cart-plus"></i> Add
                      </button>
                    </div>
                  </div>
                </div>
              <?php
              }
            } else {
              ?>
              <div class="col-md-12 text-center bg-info p-3">
                <h2>No products available</h2>
              </div>
            <?php
            }
            ?>
          </div>
        </div>


      </div>
    </div>
    <div class="col-md-4">
      <div class="added-products">
        <div class="container mt-4">
          <h4>Added Products</h4>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Amount</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="3" class="text-right font-weight-bold">Order ID : # 674637</td>
                <td colspan="2" class="text-right font-weight-bold">Total: $<span id="totalAmount">0.00</span></td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <!-- Payment Methods -->
      <div class="compolte-order-sectiom">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center">
              <button class="btn btn-danger btn-error btn-lg btn-block"><i class="fas fa-times"></i> Cancel Order</button>
              <button class="btn btn-success btn-lg btn-block"><i class="fas fa-check"></i> Complete Order</button>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>





  <?php include "footer.php"; ?>