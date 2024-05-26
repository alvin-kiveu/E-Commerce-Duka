<?php include "header.php"; ?>
<style>
    .smaller-image {
        max-width: 100px;
        /* Adjust the width as needed */
    }

    .cart-item {
        box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;
        border: 1px solid #ccc;
        margin-bottom: 10px;
        padding: 10px;
        align-items: center;
    }

    /* Adjust the style of the quantity input */
    .input-group .input-group-btn:last-child>.btn:not(:first-child):not(:last-child) {
        border-radius: 0;
    }

    .input-group .input-group-btn:last-child>.btn:first-child {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .input-group .input-group-btn:first-child>.btn:last-child {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }
    

</style>
<div class="container mt-5">
    <h2>Your Shopping Cart</h2>
    <div id="cart-items">
        <?php
        //GET ALL PRODUCTS IN THE CART
        $getCartProducts = mysqli_query($db, "SELECT * FROM cart_items ORDER BY id DESC");
        if (mysqli_num_rows($getCartProducts) > 0) {
            while ($cartProduct = mysqli_fetch_array($getCartProducts)) {
                $productId = $cartProduct['product_id'];
                $productDetails = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM products WHERE product_id = '$productId'"));
        ?>
                <div class="row cart-item">
                    <div class="col-md-3">
                        <img src="productimage/<?php echo $productDetails['image']; ?>" class="img-fluid smaller-image" alt="Product Image">
                    </div>
                    <div class="col-md-3">
                        <h5><?php echo $productDetails['title']; ?></h5>
                    </div>
                    <div class="col-md-2">
                        <p>Ksh <?php echo $productDetails['price']; ?></p>
                    </div>
                    <div class="col-md-2">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="quant[<?php echo $productId; ?>]">
                                    <span class="fas fa-minus"></span>
                                </button>
                            </span>
                            <input type="text" name="quant[<?php echo $productId; ?>]" class="form-control input-number" value="<?php echo $cartProduct['quantity']; ?>" min="1" max="100">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[<?php echo $productId; ?>]">
                                    <span class="fas fa-plus"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <p class="item-total" data-product-id="<?php echo $productId; ?>">Ksh <?php echo $productDetails['price'] * $cartProduct['quantity']; ?></p>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-danger remove-from-cart" data-product-id="<?php echo $productId; ?>"><i class="fas fa-trash-alt"></i> Remove</button>
                    </div>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="col-md-12 text-center bg-info p-3">
                <h2>No products in the cart</h2>
            </div>
        <?php
        }
        ?>


    </div>
    <div class="row mt-4">
        <div class="col-md-6 offset-md-6 text-right">
            <p class="cart-total">Total: <span id="cart-total">0</span></p>
            <button class="btn btn-success animate__animated animate__rubberBand">Proceed to Checkout <i class="fas fa-chevron-right"></i></button>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>