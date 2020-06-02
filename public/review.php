<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/27/2020
 * Time: 5:52 PM
 */

include_once '../private/init.php';
$title = 'Add a review';
include_once SHARED_PATH. '/header.php';
include_once SHARED_PATH. '/header_nav.php';

if(isset($_POST['send']))

?>

<div class="container">
    <div class="review-form">
        <form action="review.php" method="post">
            <div class="form-group">
                <label for="review">What do you have to say about the product?</label>
                <input name="review" id="review" class="form-control">
            </div>

            <div class="form-group">
                <button name="send" class="form-control btn btn-outline-primary">Send review</button>
            </div>

        </form>
    </div>
</div>

<?php
include_once SHARED_PATH. '/footer_nav.php';
include_once SHARED_PATH. '/footer.php';
