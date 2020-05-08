<?php
require '../private/init.php';

$title = 'Product Detail';
require '../private/includes/header.php';
require '../private/includes/header_nav.php';
$result = Product::findProduct($_GET['product_id']);


?>

<div class="container">
  <div class="detail">
    <div class="row justify-content-center">
      <div class="col-5">
        <img src="<?= $result['image']; ?>" alt="product img" class="detail-img img-fluid">
      </div>
      <div class="col-5">
        <h3 class="detail-title"><?= $result['name']?></h3>
        <p class="detail-desc"><?= $result['description'];?></p>
        <p class="detail-price">Price: GHC<?= $result['price']; ?></p>
          <a href="buynow.php?product_id=<?= $result['product_id'] ?>" class="btn btn-detail" > <i class="fa fa-money"></i>Checkout</a>
          <a href="addToCart.php?product_id= <?= $result['product_id'];?>" class="btn btn-detail"><i class="fa fa-shopping-cart"></i>Add to Cart</a>

      </div>
    </div>


  </div>

  <div class="similar-items">

  </div>
</div>

<?php
require '../private/includes/footer.php';
require '../private/includes/footer_nav.php';?>