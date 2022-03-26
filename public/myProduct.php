<?php
require '../private/init.php';
$title = 'Purchased Products';
require '../private/includes/header.php';
require '../private/includes/header_nav.php';

$products =  Purchase::myPurchases();
?>

<div class="container">
    <h3 class="form-title"> Requested products</h3>
    <div class="cart-area">
        <table class="table table-stripped">
            <tr>
                <th>Product Name</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach($products as $product): ?>
            <tr>
                <td><?= $product['name']; ?></td>
                <td><?= $product['description']; ?></td>
                <td><?= $product['quantity']; ?></td>
                <td><?= $product['unit_price']; ?></td>
                <td><?= $product['total_price']; ?></td>
                <td>
                    <?= $product['purchase_status']; ?>
<!--                    --><?php //if($product['purchase_status'] == 'delivered'):?>
<!--                        <a href= "--><?php //echo 'review.php?review='. $product['product_id']?><!--">add a review</a>-->
<!--                    --><?php //endif ?>
                </td>

            </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>



<?php
require '../private/includes/footer.php';
require '../private/includes/footer_nav.php';?>
