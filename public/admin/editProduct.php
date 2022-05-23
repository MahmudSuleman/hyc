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

global $db;
//get product categories
$allCategories = $db->select('categories', [])->results();


if (isset($_POST['add'])) {
    $arg = [];
    $arg['name'] = $_POST['name'];
    $arg['price'] = $_POST['price'];
    $arg['description'] = $_POST['desc'];
    $arg['category_id'] = $_POST['category_id'];
    $arg['quantity'] = $_POST['qty'];
    $arg['product_id']  = $_POST['hidden_id'] ?? '';
    $product = Product::findProduct($arg['product_id']);
    if(!$product)
        redirect_to($_SERVER['HTTP_REFERER']);
    $product = new Product($arg);
    $product->updateProduct($arg['product_id']);
    redirect_to(url_for('/admin/allProducts.php'));
} else {
    if(!isset($_GET['product_id']))
        redirect_to(url_for('/admin/allProducts.php'));
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
        <form action="editProduct.php?product_id=<?= $product['product_id'] ?>" method="post"
              enctype="multipart/form-data">
            <input type="text" hidden value="<?= $product['product_id'] ?>" name="hidden_id">

            <div class="form-group">
                <label for="name">Product Name</label>
                <input class="form-control" type="text" name="name" id="name" required
                       value="<?= $name = $product['name'] ?? '' ?>"/>
            </div>

            <div class="form-group">
                <label for="price">Product Price(GHC)</label>
                <input class="form-control" type="text" name="price" id="price" required
                       value="<?= $price = $product['price'] ?? '' ?>"/>
            </div>

            <div class="form-group">
                <label for="category_id">Product Category</label>
                <select name="category_id" id="category" class="form-control">
                    <option value="">Please choose category</option>
                    <?php foreach ($allCategories as $category): ?>
                        <option <?= $category['id'] == $product['category_id'] ? 'selected': '' ?> value="<?= $category['id']; ?>"><?= $category['category'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>


            <div class="form-group">
                <label for="desc">Product Description</label>
                <input class="form-control" id="desc" type="text" required="" name="desc"
                       value="<?= $desc = $product['description'] ?? '' ?>"/>
            </div>

            <div class="form-group">
                <label for="pic">Product Image</label>
                <input class="form-control" id="pic" type="file"  name="pic" value="<?= $img ?>"/>
            </div>

            <div class="form-group">
                <label for="qty">Quantity</label>
                <input class="form-control" id="qty" type="number" required="" name="qty"
                       value="<?= $qty = $product['quantity'] ?? '' ?>"/>
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
<?php
require_once SHARED_PATH . '/footer.php';
