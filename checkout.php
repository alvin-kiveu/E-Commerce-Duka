<?php include "header.php"; ?>

    <div class="container mt-5">
        <h2>Checkout</h2>
        <form id="checkout-form">
            <div class="form-section">
                <h4>Billing Information</h4>
                <div class="form-group">
                    <label for="billingName">Full Name</label>
                    <input type="text" class="form-control" id="billingName" placeholder="Enter full name" required>
                </div>
                <div class="form-group">
                    <label for="billingEmail">Email</label>
                    <input type="email" class="form-control" id="billingEmail" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <label for="billingAddress">Address</label>
                    <input type="text" class="form-control" id="billingAddress" placeholder="Enter address" required>
                </div>
                <div class="form-group">
                    <label for="billingCity">City</label>
                    <input type="text" class="form-control" id="billingCity" placeholder="Enter city" required>
                </div>
                <div class="form-group">
                    <label for="billingState">State</label>
                    <input type="text" class="form-control" id="billingState" placeholder="Enter state" required>
                </div>
                <div class="form-group">
                    <label for="billingZip">Zip Code</label>
                    <input type="text" class="form-control" id="billingZip" placeholder="Enter zip code" required>
                </div>
            </div>

            <div class="form-section">
                <h4>Shipping Information</h4>
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="sameAsBilling">
                    <label class="form-check-label" for="sameAsBilling">Same as billing information</label>
                </div>
                <div class="form-group">
                    <label for="shippingName">Full Name</label>
                    <input type="text" class="form-control" id="shippingName" placeholder="Enter full name" required>
                </div>
                <div class="form-group">
                    <label for="shippingEmail">Email</label>
                    <input type="email" class="form-control" id="shippingEmail" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <label for="shippingAddress">Address</label>
                    <input type="text" class="form-control" id="shippingAddress" placeholder="Enter address" required>
                </div>
                <div class="form-group">
                    <label for="shippingCity">City</label>
                    <input type="text" class="form-control" id="shippingCity" placeholder="Enter city" required>
                </div>
                <div class="form-group">
                    <label for="shippingState">State</label>
                    <input type="text" class="form-control" id="shippingState" placeholder="Enter state" required>
                </div>
                <div class="form-group">
                    <label for="shippingZip">Zip Code</label>
                    <input type="text" class="form-control" id="shippingZip" placeholder="Enter zip code" required>
                </div>
            </div>

            <div class="form-section">
                <h4>Payment Information</h4>
                <div class="form-group">
                    <label for="cardName">Name on Card</label>
                    <input type="text" class="form-control" id="cardName" placeholder="Enter name on card" required>
                </div>
                <div class="form-group">
                    <label for="cardNumber">Card Number</label>
                    <input type="text" class="form-control" id="cardNumber" placeholder="Enter card number" required>
                </div>
                <div class="form-group">
                    <label for="cardExpiry">Expiry Date</label>
                    <input type="text" class="form-control" id="cardExpiry" placeholder="MM/YY" required>
                </div>
                <div class="form-group">
                    <label for="cardCVC">CVC</label>
                    <input type="text" class="form-control" id="cardCVC" placeholder="CVC" required>
                </div>
            </div>

            <div class="form-section">
                <h4>Order Summary</h4>
                <div id="cart-items">
                    <!-- Cart Item 1 -->
                    <div class="row cart-item">
                        <div class="col-md-8">
                            <h5>Product Title 1</h5>
                            <p>Quantity: 1</p>
                        </div>
                        <div class="col-md-4 text-right">
                            <p>$19.99</p>
                        </div>
                    </div>
                    <!-- Additional cart items can be added here following the same structure -->
                </div>
                <div class="row mt-3">
                    <div class="col-md-12 text-right">
                        <p class="cart-total">Total: <span id="cart-total">$19.99</span></p>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Place Order</button>
        </form>
    </div>
<?php include "footer.php"; ?>