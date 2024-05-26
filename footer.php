<footer class="bg-light text-center text-lg-start mt-5">
  <div class="text-center p-3">
    © 2024 E-Commerce:
    <a class="text-dark" href="#">ecommerce.com</a>
  </div>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
  function addToCart(product_id) {
    var xhttpData = new XMLHttpRequest();
    xhttpData.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var response = this.responseText;
        var data = JSON.parse(response);
        if (data.status == 1) {
          var num_items = data.num_items;
          $('.cart-badge').text(num_items);
          swal("Success", "Product added to cart", "success");
        } else {
          swal("Error", "Product not added to cart", "error");
        }
      }
    };
    xhttpData.open("POST", "backend/add_to_cart.php", true);
    xhttpData.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttpData.send("productId=" + product_id);
  }
</script>



<script>
  $(document).ready(function() {
    $('.toast').toast('show');
  });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>