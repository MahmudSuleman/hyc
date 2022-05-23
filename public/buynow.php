<?php
require '../private/init.php';
$title = 'Buy now';
require '../private/includes/header.php';
require '../private/includes/header_nav.php';

require_login();
$user = User::findUser($_SESSION['username']);

$available_quantity = Product::quantityAvailable(trim($_GET['product_id']));

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
                    <p class="detail-price">Price(GHC): <input type="number" readonly value="<?= $result['price']; ?>" id="unit_price"></p>

                    <form action="confirmOrder.php" method="get">
                        <div class="form-group">
                            <label for="qty">quantity</label>
                            <input required id="qty" value="1"  type="number" min="1" max="<?php echo $available_quantity; ?>" name="qty"/>
                        </div>
                        <div class="form-group">
                            <label for="total">Total Price(GHC):</label>
                            <input type="number" disabled id="total_price" value="<?= $result['price'] ?>"/>
                        </div>
                        <div class="form-group">
                            <p>Number available : <?php echo $available_quantity; ?> </p>
                        </div>
                        <div class="form-group">
                            <button
                                <?php if ($available_quantity <= 0) echo 'disabled'; ?>
                                name="submit" type="submit" class="btn btn-outline-primary"> <i class="fa fa-money"></i>Check Out</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>

        <div class="address-box">
            <p class="title">Your product wil be sent to this address</p>
            <p><?php echo  $user['firstname'] . ' ' . $user['lastname']; ?></p>
            <p><?= $user['phone']; ?></p>
            <p><?php // $user['address']; ?></p>

            <p style="font-style: italic;">You can consider updating your personal information
                <a href="<?php echo url_for('profile.php') ?>" target="_blank">here</a> before confirming the order.</p>
        </div>
    </div>

<script>
    function update_total(){
        const unit_price = document.getElementById('unit_price').value;
        const qty = document.getElementById('qty').value;
        const total = unit_price * qty;
        document.getElementById('total_price').setAttribute('value', total.toString());
    }

    const number_input = document.getElementById('qty');
    number_input.addEventListener('change', update_total);
</script>
<?php
require '../private/includes/footer.php';
require '../private/includes/footer_nav.php';?>
