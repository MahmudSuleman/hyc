<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 4/16/2020
 * Time: 8:41 AM
 */

require_once '../../private/init.php';
//require_admin_login();
$title = "Add product";
require_once SHARED_PATH . '/header.php';
require_once SHARED_PATH . '/header_nav.php';




if (isset($_POST['add'])) {
    $arg = [];
    $arg['product_id'] = rand(111111111, 999999999);
    $arg['name'] = $_POST['name'];
    $arg['price'] = $_POST['price'];
    $arg['description'] = $_POST['desc'];
    $arg['category'] = $_POST['category'];
    $arg['quantity'] = $_POST['qty'];
    $product = new Product($arg);
    if ($product->addProduct())
        echo "<script>confirm('product added successfullly...')</script>";
}


?>

<div class="container">
    <div class="login">
        <h2 class="form-title">Add New Product</h2>
        <form action="addProduct.php" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="name">Product Name</label>
                <input class="form-control" type="text" name="name" id="name" required />
            </div>

            <div class="form-group">
                <label for="price">Product Price(GHC)</label>
                <input class="form-control" type="text" name="price" id="price" required />
            </div>

            <div class="form-group">
                <label for="category">Product Category</label>
                <select name="category" id="category" class="form-control">
                    <option value="men">Men</option>
                    <option value="women">Women</option>
                    <option value="babies">Babies</option>
                </select>
            </div>


            <div class="form-group">
                <label for="desc">Product Description</label>
                <input class="form-control" id="desc" type="text" required="" name="desc" />
            </div>

            <div class="form-group">
                <label for="pic">Product Image</label>
                <input class="form-control" id="pic" type="file" required="" name="pic" />
            </div>

            <div class="form-group">
                <label for="qty">Quantity</label>
                <input class="form-control" id="qty" type="number" required="" name="qty" />
            </div>

            <div class="form-group">
                <button class="btn btn-outline-success btn-block" name="add" type="submit">Add Product</button>
            </div>
        </form>
    </div>
</div>
<script src="../../node_modules/popper.js/dist/popper.min.js"></script>
<script src="../../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>