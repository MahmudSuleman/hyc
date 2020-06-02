<?php
include_once '../../private/init.php';

$title = 'Admin Homepage';
include_once SHARED_PATH . '/header.php';
include_once SHARED_PATH . '/header_nav.php';

?>

<div class="container">
    <div class="admin">
        <div class="row">
            <div class="col">
                <a href="<?php echo url_for('admin/addProduct.php') ; ?>"  class="panel-card-link text-center">
                    <span><i class="fa fa-plus"></i></span>
                    <p>add product</p>
                </a>
            </div>

            <div class="col">
                <a href="<?php echo url_for('admin/search.php') ; ?>"  class="panel-card-link text-center">
                    <span><i class="fa fa-search-plus"></i></span>
                    <p>search product</p>
                </a>
            </div>

            <div class="col">
                <a href="<?php echo url_for('admin/allProducts.php') ; ?>" class="panel-card-link text-center">
                    <span><i class="fa fa-shopping-basket"></i></span>
                    <p>All product</p>
                </a>
            </div>

        </div>

        <div class="row">


        </div>

    </div>
</div>

<?php
include_once SHARED_PATH . '/footer_nav.php';
include_once SHARED_PATH . '/footer.php';

?>