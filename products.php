<?php include "header.php"; ?>
<div class="container mt-5">
        <h2>Product List</h2>
        <div class="row">
            <div class="col-md-6">
                <a href="add_product.php" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Add Product</a>
            </div>

        </div>
        <br>
        <table class="table table-bordered  table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Product ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $getProducts = mysqli_query($db, "SELECT * FROM products");
                if (mysqli_num_rows($getProducts) < 1) {
                    echo "<tr><td colspan='6' class='text-center'>No product available</td></tr>";
                }
                $no = 1;
                while ($product = mysqli_fetch_assoc($getProducts)) {
                ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $product['title']; ?></td>
                        <td><?php echo $product['price']; ?></td>
                        <td><img src="productimage/<?php echo $product['image']; ?>" alt="<?php echo $product['title']; ?>" style="width: 100px;"></td>
                        <td><?php echo $product['product_id']; ?></td>
                        <td>
                            <a href="edit_product.php?product_id=<?php echo $product['product_id']; ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            <a href="backend/product_manager.php?deleteproduct=<?php echo $product['product_id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
<?php include "footer.php"; ?>