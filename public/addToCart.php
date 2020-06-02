<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 4/10/2020
 * Time: 9:18 AM
 */
require_once '../private/init.php';
require_login();
$data = $_GET['product_id'];

if(Product::addToCart($data, $_SESSION['username'])){
    header("location: cart.php");
}else{
    echo 'not ok';
}
//

