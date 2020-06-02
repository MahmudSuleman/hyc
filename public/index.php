<?php
/**
 * Created by PhpStorm.
 * User: Chamtooni
 * Date: 3/12/2020
 * Time: 11:10
 *
 */
$title = "Homepage";
require_once '../private/init.php';
require_once '../private/includes/header.php';
require_once '../private/includes/header_nav.php';


$products = Product::allProducts();


?>

<!--    header section definition-->
<div class="row header">


<!--        slide show section definition-->
    <div class="slide-show container">


        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img  class="d-block w-100 c_img" src="img/baby_mama.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Baby and Mama stuffs</h3>
                        <p>Buy all your baby stuff with us at an affordable price</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 c_img" src="img/men_suit1.jpg" alt="Second slide">
                    <div class="carousel-caption ">
                        <h3>Men suits and wrist watches</h3>
                        <p>Look gorgeous in our varieties of men wrist watches. Try re-branding yourself</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 c_img" src="img/women_hb1.jpg" alt="Third slide">
                    <div class="carousel-caption">
                        <h3>Ladies hand bags</h3>
                        <p>Cute ladies hand bags are also available in our store</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

</div>

<h2 class="heading">featured products</h2>

<div class="container product">
    <div class="row justify-content-center">
        <?php foreach($products as $product => $data): ?>
            <!-- just a dummy data for testing -->
        <div class="col-md-4 col-sm-6">
            <div class="product-box">
                <img class="img-fluid " src="<?= $data['image']?>" alt="product">
                <p><?= $data['name'];?></p>
                <p>Price: GHC<?= $data['price'];?></p>
                <a href="detail.php?product_id=<?= $data['product_id'] ?>" class="btn btn-detail" >Product Detail</a>
                <a href="addToCart.php?product_id= <?= $data['product_id'];?>" class="btn btn-detail"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
            </div>
        </div>
    <?php endforeach ?>
    </div>
</div>
<?php 

require_once '../private/includes/footer_nav.php';
require_once '../private/includes/footer.php';