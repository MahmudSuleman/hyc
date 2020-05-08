<?php
/**
 * Created by PhpStorm.
 * User: Chamtooni
 * Date: 3/18/2020
 * Time: 13:11
 */
$title = 'cart';
require_once '../private/init.php';
require_once '../private/includes/header.php';
require_once '../private/includes/header_nav.php';

if (isset($_SESSION['userName'])) {
    $product = Product::cartProduct($_SESSION['userName']);
    if(!empty($product))
        $num_cart_items = count($product);
    else
        $num_cart_items = 0;
} else {
    $num_cart_items = 0;
}
?>

    <div class="container cart">
        <h3 class="cart-title"> <?php echo $num_cart_items; ?> items(s)</h3>

        <div class="cart-area">

            <!--        show view depending on the number of items in the cart-->
            <?php if ($num_cart_items == 0) { ?>
                <div class="cart-products-0"></div>
                <p>if you hesitate to buy something, add it to your cart.</p>
            <?php } else { ?>
                <div class="cart-products-1">
                <form action="">
                <table class="table table-hover table-responsive">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Unit price(GHC)</th>
                    <th colspan="2">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($product as $data) { ?>
                    <tr>
                        <td><img src="<?= $data['image']; ?>" class="cart-img" alt="pic of product"/></td>
                        <td><?= $data['name']; ?></td>
                        <td><?= $data['description']; ?></td>
                        <td><?= $data['price']; ?></td>
                        <td><a href="buynow.php?product_id=<?= $data['product_id']; ?>"
                               class="btn btn-outline-buy  fa fa-money">Buy Now</a></td>
                        <td><a href="removeProduct.php?product_id=<?= $data['product_id']; ?>"
                               class="btn btn-outline-remove fa fa-remove">Remove</a></td>
                    </tr>

                    </div>
                <?php
                }
            } ?>
            </tbody>
            </table>
            </form>
        </div>
    </div>


<?php
require_once '../private/includes/footer_nav.php';
require_once '../private/includes/footer.php';?>