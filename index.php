<?php include "header.php"; ?>
<div class="container mt-5">
    <div class="row">
        <?php
        $getProducts = mysqli_query($db, "SELECT * FROM products ORDER BY id DESC");
        if (mysqli_num_rows($getProducts) > 0) {
            while ($product = mysqli_fetch_array($getProducts)) {
        ?>
                <div class="col-md-4">
                    <div class="card mb-4 product-card">
                        <img src="productimage/<?php echo $product['image']; ?>" class="card-img-top product-image" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title"><a href="details.php?product_id=<?php echo $product['product_id']; ?>"><?php echo $product['title']; ?></a></h5>
                            <h6>Ksh <?php echo $product['price']; ?></h6>
                            <button class="btn btn-outline-success add-to-cart" onclick="addToCart('<?php echo $product['product_id']; ?>')">
                                <i class="fas fa-cart-plus"></i> Add to Cart
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
<?php include "footer.php"; ?>