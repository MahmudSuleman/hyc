<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 4/23/2020
 * Time: 8:21 AM
 */

include_once '../../private/init.php';
//require_admin_login();

$product = h($_GET['product_id']) ?? '';

Product::deleteProduct($product);

redirect_to('allProducts.php');