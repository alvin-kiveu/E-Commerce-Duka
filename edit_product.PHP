<?php
include "header.php";
$product_id = $_GET['product_id'];
$getProduct = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM products WHERE product_id = '$product_id'"));
?>
<div class="container mt-5">
    <form id="add-product-form" class="card" enctype="multipart/form-data" method="post" action="backend/product_manager.php">
        <div class="card-header">
            <h2>Edit Product</h2>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="productTitle">Product Title</label>
                <input type="text" class="form-control" id="productTitle" name="title" placeholder="Enter product title" value="<?php echo $getProduct['title']; ?>" required>
            </div>
            <div class="form-group">
                <label for="productPrice">Price</label>
                <input type="number" class="form-control" id="productPrice" name="price" placeholder="Enter product price" value="<?php echo $getProduct['price']; ?>" required>
            </div>
            <div class="form-group">
                <label for="productImage">Product Image</label>
                <input type="file" class="form-control" id="productImage" name="image" value="<?php echo $getProduct['image']; ?>" required>
                <input type="hidden" name="product_id" value="<?php echo $getProduct['product_id']; ?>">
                <img id="imagePreview" src="productimage/<?php echo $getProduct['image']; ?>" alt="Image Preview" style="margin-top: 10px; max-height: 200px;">
                <img id="imagePreview" src="#" alt="Image Preview" style="display: none; margin-top: 10px; max-height: 200px;">
            </div>
            <button type="submit" name="editproduct" class="btn btn-primary">Edit Product</button>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    document.getElementById('productImage').addEventListener('change', function(e) {
        const [file] = e.target.files;
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('imagePreview').src = event.target.result;
                document.getElementById('imagePreview').style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });
</script>
<?php include "footer.php"; ?>