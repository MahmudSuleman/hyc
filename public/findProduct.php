<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 4/22/2020
 * Time: 3:16 PM
 */

include_once '../private/init.php';
$title = 'Find Product';
include_once '../private/includes/header.php';
include_once '../private/includes/header_nav.php';

if(isset($_GET['product']))
{
    $product = h($_GET['product']) ?? '';
//    $cat = h($_GET['category']) ?? '';

    $products = Product::findSearchedProducts($product) ?? 'no results';
}

$products2 = Product::allProducts();


?>
<div class="container">

    <h2 class="heading">available products</h2>

    <?php if(!empty($products)){?>
    <div class="container">
        <div class="row justify-content-center">
            <?php foreach($products as $product => $data): ?>
                <!-- just a dummy data for testing -->
                <div class="col-md-4 col-sm-6">
                    <div class="product-box">
                        <img src="<?= $data['image']?>" alt="product">
                        <p><?= $data['name'];?></p>
                        <p>Price: GHC<?= $data['price'];?></p>
                        <a href="detail.php?product_id=<?= $data['product_id'] ?>" class="btn btn-detail" >Product Detail</a>
                        <a href="addToCart.php?product_id= <?= $data['product_id'];?>" class="btn btn-detail"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>

    <?php } else { ?>
    <p class="heading"> Sorry, Product unavailable.</p>

    <?php } ?>


    <h3 class="heading">picks for you</h3>

    <div class="container">
        <div class="row justify-content-center">
            <?php foreach($products2 as $product => $data): ?>
                <!-- just a dummy data for testing -->
                <div class="col-md-4 col-sm-6">
                    <div class="product-box">
                        <img src="<?= $data['image']?>" alt="product">
                        <p><?= $data['name'];?></p>
                        <p>Price: GHC<?= $data['price'];?></p>
                        <a href="detail.php?product_id=<?= $data['product_id'] ?>" class="btn btn-detail" >Product Detail</a>
                        <a href="addToCart.php?product_id= <?= $data['product_id'];?>" class="btn btn-detail"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>

</div>

<?php

include_once '../private/includes/footer_nav.php';
include_once '../private/includes/footer.php';
