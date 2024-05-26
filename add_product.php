<?php include "header.php"; ?>
<style>
    /* CSS for animations */
    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    .form-group {
        animation: fadeIn 1s ease-in-out;
    }

    /* Style for image preview */
    #imagePreview {
        display: none;
        margin-top: 10px;
        max-height: 200px;
    }
</style>
<div class="container mt-5">
    <form id="add-product-form" class="card" enctype="multipart/form-data" method="post" action="backend/product_manager.php">
        <div class="card-header">
            <h2>Add Product</h2>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="productTitle"><i class="fas fa-tag"></i> Product Title</label>
                <input type="text" class="form-control" id="productTitle" name="title" placeholder="Enter product title" required>
            </div>
            <div class="form-group">
                <label for="productPrice"><i class="fas fa-money-bill-wave"></i> Price</label>
                <input type="number" class="form-control" id="productPrice" name="price" placeholder="Enter product price" required>
            </div>
            <div class="form-group">
                <label for="productImage"><i class="fas fa-image"></i> Product Image</label>
                <input type="file" class="form-control" id="productImage" name="image" required>
                <img id="imagePreview" src="#" alt="Image Preview">
            </div>
            <button type="submit" name="addproduct" class="btn btn-primary">Add Product</button>
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