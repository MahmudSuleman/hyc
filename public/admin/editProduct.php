<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 4/16/2020
 * Time: 8:41 AM
 */

require_once '../../private/init.php';
//require_admin_login();
$title = "Update Product Detail";
require_once SHARED_PATH . '/header.php';
require_once SHARED_PATH . '/header_nav.php';




if (isset($_POST['add'])) {
    $arg = [];
    $arg['name'] = $_POST['name'];
    $arg['price'] = $_POST['price'];
    $arg['description'] = $_POST['desc'];
    $arg['category'] = $_POST['category'];
    $arg['quantity'] = $_POST['qty'];
    $product = new Product($arg);
    $product->updateProduct($_GET['product_id']);
    header("location: index.php");
} else {
    $product = Product::findProduct($_GET['product_id']);
    $img = explode('/', $product['image']);
    $img = end($img);
}

//print($img);
//die();


?>

<div class="container">
    <div class="login">
        <h2 class="form-title">Update Product</h2>
        <form action="editProduct.php?product_id=<?= $product['product_id'] ?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="name">Product Name</label>
                <input class="form-control" type="text" name="name" id="name" required value="<?= $name = $product['name'] ?? '' ?>" />
            </div>

            <div class="form-group">
                <label for="price">Product Price(GHC)</label>
                <input class="form-control" type="text" name="price" id="price" required value="<?= $price = $product['price'] ?? '' ?>" />
            </div>

            <div class="form-group">
                <label for="category">Product Category</label>
                <select name="category" id="category" class="form-control">
                    <option value="men" <?php if (!empty($product) && $product['category'] == 'men') {
                                            echo "selected";
                                        } ?>>Men</option>
                    <option value="women" <?php if (!empty($product) && $product['category'] == 'women') {
                                                echo "selected";
                                            } ?>>Women</option>
                    <option value="babies" <?php if (!empty($product) && $product['category'] == 'baby') {
                                                echo "selected";
                                            } ?>>Babies</option>
                </select>
            </div>


            <div class="form-group">
                <label for="desc">Product Description</label>
                <input class="form-control" id="desc" type="text" required="" name="desc" value="<?= $desc =  $product['description'] ?? '' ?>" />
            </div>

            <div class="form-group">
                <label for="pic">Product Image</label>
                <input class="form-control" id="pic" type="file" required="" name="pic" value="<?= $img ?>" />
            </div>

            <div class="form-group">
                <label for="qty">Quantity</label>
                <input class="form-control" id="qty" type="number" required="" name="qty" value="<?= $qty =  $product['quantity'] ?? '' ?>" />
            </div>

            <div class="form-group">
                <button class="btn btn-outline-success btn-block" name="add" type="submit">Update Product</button>
            </div>
        </form>
    </div>
</div>
<script src="../../node_modules/popper.js/dist/popper.min.js"></script>
<script src="../../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>