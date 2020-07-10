<?php
include_once '../../private/init.php';
//require_admin_login();

$title = 'Product';
include_once SHARED_PATH . '/header.php';
include_once SHARED_PATH . '/header_nav.php';


$products = Product::allProducts();


?>

<div class="container">

    <div class="search-area">
        <div class="search-form">
            <p>AVAILABLE PRODUCTS</p>
        </div>
        <div class="display-area">
            <?php if (!empty($products)) { ?>
                <table class="table table-striped table-responsive-sm">
                    <tr>
                        <td>Name</td>
                        <td>Description</td>
                        <td>Quantity</td>
                        <td>Unit Price (GHC)</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <?php foreach ($products as $product) { ?>
                        <tr>
                            <td><?= $product['name'] ?></td>
                            <td><?= $product['description'] ?></td>
                            <td><?= $product['quantity'] ?></td>
                            <td><?= $product['price'] ?></td>
                            <td><a href="editProduct.php?product_id=<?= $product['product_id'] ?>" class="btn btn-outline-primary">Update</a></td>
                            <td><a href="deleteProduct.php?product_id=<?= $product['product_id'] ?>" class="btn btn-outline-danger">Delete</a></td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } else {
                echo 'NO AVAILABLE DATA';
            } ?>
        </div>

    </div>

</div>

<script src="../../node_modules/popper.js/dist/popper.min.js"></script>
<script src="../../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>