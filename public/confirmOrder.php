<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 4/26/2020
 * Time: 10:03 AM
 */

include_once '../private/init.php';

$title = 'Review Product And Confirm Order';

include SHARED_PATH . '/header.php';
include SHARED_PATH . '/header_nav.php';

$user = User::findUser($_SESSION['username']);

$product = Product::findProduct($_SESSION['product_id']);
$qty = $_GET['qty'] ?? 0;
$total = $product['price'] * $qty;

if(isset($_GET['submit'])){
    $username = $_SESSION['username'];
    $product_id = $product['product_id'];
    $qty = $_GET['qty'];
    Product::reduceProductCount($qty, $product_id);
    Purchase::addPurchase($username, $product_id, $product['price'], $qty,$total );
    redirect_to(url_for('thankyou.php'));
}

?>
<div class="container">
       <div class="address-box">
           <p class="title">Your product wil be sent to this address</p>
           <p><?php echo  $user['firstName'] . ' ' . $user['lastName']; ?></p>
           <p><?= $user['phone']; ?></p>
           <p><?= $user['address']; ?></p>

           <p style="font-style: italic;">You can consider updating your personal information
               <a href="<?php echo url_for('profile.php') ?>" target="_blank">here</a> before confirming the order.</p>
       </div>


        <div class="confirm-order-product-box center">
            <form action="confirmOrder.php" method="get">
                <img src="<?php echo $product['image']; ?>" alt="product"/>
                <p><?php echo $product['name'];?></p>
                <p><?php echo $product['description']?></p>
                <p>Unit Price (GHC): <?php echo $product['price'] ?></p>
                <p>Quantity: <input type="number" disabled value="<?php echo $qty; ?>" name="qty"/></p>
                <p>Total Price (GHC): <?php echo $total?></p>
                <button class="btn btn-primary" type="submit" name="submit">Confirm Order</button>
            </form>

        </div>
</div>

<?php
include SHARED_PATH . '/footer_nav.php';
include SHARED_PATH . '/footer.php';?>
