<?php
require '../private/init.php';
$title = 'Buy now';
require '../private/includes/header.php';
require '../private/includes/header_nav.php';

if(empty($_SESSION['userName']))
    header('location: login.php');

if(isset($_POST['submit']))
{

    $_SESSION['qty'] = $_POST['qty'];
//    header("location: confirmOrder.php");
}
$result = Product::findProduct($_GET['product_id']);

$_SESSION['product_id'] = $_GET['product_id'];
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

                    <form action="confirmOrder.php" method="get">
                        <div class="form-group">
                            <label for="qty">quantity</label>
                            <input required id="qty"  type="number" min="1" max="5" name="qty"/>
                        </div>
                        <div class="form-group">
                            <button name="submit" type="submit" class="btn btn-outline-primary"> <i class="fa fa-money"></i>Check Out</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>

        <div class="similar-items">

        </div>
    </div>

<?php
require '../private/includes/footer.php';
require '../private/includes/footer_nav.php';?>