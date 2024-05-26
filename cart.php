<?php include "header.php"; ?>
<div class="container mt-5">
    <h2>Your Shopping Cart</h2>
    <div id="cart-items">
        <!-- Cart Item 1 -->
        <div class="row cart-item">
            <div class="col-md-3">
                <img src="https://via.placeholder.com/150" class="img-fluid" alt="Product Image">
            </div>
            <div class="col-md-3">
                <h5>Product Title 1</h5>
            </div>
            <div class="col-md-2">
                <p>$19.99</p>
            </div>
            <div class="col-md-2">
                <input type="number" class="form-control" value="1" min="1" id="quantity-1">
            </div>
            <div class="col-md-2">
                <p class="item-total" id="total-1">$19.99</p>
            </div>
        </div>
        <!-- Additional cart items can be added here following the same structure -->
    </div>
    <div class="row mt-4">
        <div class="col-md-6 offset-md-6 text-right">
            <p class="cart-total">Total: <span id="cart-total">$19.99</span></p>
            <button class="btn btn-success">Proceed to Checkout</button>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>