<?php
include "header.php";
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Fetch product details from the database
    $query = "SELECT * FROM products WHERE product_id = '$product_id'";
    $result = mysqli_query($db, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $getProducts = mysqli_fetch_assoc($result);
?>
        <div class="container mt-5">
            <div class="card">
                <div class="card-body row">
                    <div class="col-md-6">
                        <img src="productimage/<?php echo $getProducts['image']; ?>" class="img-fluid" alt="Product Image">
                    </div>
                    <div class="col-md-6">
                        <h1><?php echo $getProducts['title']; ?></h1>
                        <h2>Ksh <?php echo $getProducts['price']; ?></h2>
                        <button class="btn btn-outline-success add-to-cart" data-product-id="<?php echo $getProducts['product_id']; ?>">
                            <i class="fas fa-cart-plus"></i> Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
<?php
    } else {
        // Product not found
        echo "<p>Product not found</p>";
    }
} else {
    // Invalid product ID
    echo "<p>Invalid product ID</p>";
}

include "footer.php";
?>