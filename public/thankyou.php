<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 4/26/2020
 * Time: 11:20 AM
 */

include_once '../private/init.php';

$title = 'Thank You!';

include_once SHARED_PATH. '/header.php';
include_once SHARED_PATH. '/header_nav.php';

//var_dump($_SESSION['product_selected']);
?>

<div class="container">
    <div class="thankyou">
        <h1>Thank You!</h1>
        <p>We use pay on delivery services on this platform...</p>
        <p>You are sure to get your package in less than a week...</p>
        <p>Pleasure doing business with you...</p>
        <p>See you some other time...</p>

    </div>
</div>

<?php
include_once SHARED_PATH. '/footer_nav.php';
include_once SHARED_PATH. '/footer.php';
?>


