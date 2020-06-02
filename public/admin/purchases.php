<?php
include_once '../../private/init.php';
//require_admin_login();

$title = 'Purchases';
include_once SHARED_PATH . '/header.php';
include_once SHARED_PATH . '/header_nav.php';

$purchase = Purchase::allPurchases();
if(!empty($purchase)) {
    ?>

    <div class="container" style="min-height:500px;width: 80%; margin: 10px auto">
        <h1 style="text-align: center; margin: 20px 0">PURCHASES</h1>
        <table class="table table-stripped" style=" text-align: center">
            <tr>
                <th>Product ID</th>
                <th>Username</th>
                <th>Purchase Date</th>
                <th>Purchase Status</th>
                <th colspan="2">Action</th>
            </tr>
            <?php foreach($purchase as $p): ?>
            <tr>
                <td><?= $p['product_id'] ?></td>
                <td><?= $p['username'] ?></td>
                <td><?= $p['purchase_date'] ?></td>
                <td><?= $p['purchase_status'] ?></td>
                <?php if($p['purchase_status'] == 'pending'): ?>
                <td><a href="<?php echo url_for('admin/confirmDelivery.php?status=pending&id='. $p['purchase_id']); ?>" class="btn btn-outline-primary">Confirm Delivery</a></td>
                <?php endif ?>
                <?php if($p['purchase_status'] == 'delivered'): ?>
                <td><a href="<?php echo url_for('admin/confirmDelivery.php?status=delivered&id='. $p['purchase_id']); ?>" class="btn btn-outline-danger">Revert Delivery</a></td>
                <?php endif ?>

            </tr>
        <?php endforeach ?>
        </table>
    </div>

<?php
}
else{
    ?>

    <div class="container w-100" style="height: 400px">
        <h1  class="title">No Purchases yet...</h1>
    </div>
<?php
}
include_once SHARED_PATH . '/footer_nav.php';
include_once SHARED_PATH . '/footer.php';

?>

<script>
     function confirm(){
         var deliver = document.
     }
</script>