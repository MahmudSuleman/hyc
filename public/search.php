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

if(isset($_GET['search']))
{
    $product = h($_GET['search_input']) ?? '';
    $products = Product::findSearchedProducts($product) ?? 'no results';
}
?>
    <div class="container" style="min-height: 500px">
        <div class="search-form">
            <form action="search.php" method="get" class="form-inline">
                <div class="form-group">
                    <input class="form-control" type="text" name="search_input" />
                    <button name="search" type="submit" class="btn btn-primary">Search <i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>


        <?php if(!empty($products)){?>
            <div class="container" style="min-height: 500px; margin-top: 50px;">
                <div class="row justify-content-center">
                    <?php foreach($products as $product => $data): ?>
                        <div class="col-md-4 col-sm-6">
                            <div class="product-box">
                                <img class="product_image" src="<?= $data['image']?>" alt="product">
                                <p><?= $data['name'];?></p>
                                <p>Price: GHC<?= $data['price'];?></p>
                                <a href="detail.php?product_id=<?= $data['product_id'] ?>" class="btn btn-detail" >Product Detail</a>
                                <a href="addToCart.php?product_id= <?= $data['product_id'];?>" class="btn btn-detail"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>

        <?php } else{ echo "<h2 class=\"heading\">search for products</h2>";}?>


        </div>

    </div>

<?php

include_once '../private/includes/footer_nav.php';
include_once '../private/includes/footer.php';
