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

$user = User::findUser($_SESSION['userName']);

$product = Product::findProduct($_SESSION['product_id']);
$_SESSION['qty'] = $_GET['qty'];

?>
<div class="container">
       <div class="address-box">
           <p class="title">Your product wil be sent to this address</p>
           <p><?php echo  $user['firstName'] . ' ' . $user['lastName']; ?></p>
           <p><?= $user['phone']; ?></p>
           <p><?= $user['address']; ?></p>

           <p style="font-style: italic;">You can consider updating your personal information
               <a href="<?php echo url_for('profile.php') ?>">here</a> before confirming the order.</p>
       </div>


        <div class="confirm-order-product-box center">
            <img src="<?php echo $product['image']; ?>" alt="product"/>
            <p><?php echo $product['name'];?></p>
            <p><?php echo $product['description']?></p>
            <p>Unit Price (GHC): <?php echo $product['price'] ?></p>
            <p>Quantity:   <?php echo $_SESSION['qty']?></p>
            <p>Total Price (GHC): <?php echo $product['price'] * $_SESSION['qty'] ?></p>

            <a href="<?php echo url_for('payment.php') ?>" class="btn btn-outline-primary">Confirm Order</a>
        </div>
</div>

<?php
include SHARED_PATH . '/footer_nav.php';
include SHARED_PATH . '/footer.php';?>