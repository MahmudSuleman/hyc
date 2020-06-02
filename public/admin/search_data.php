<?php
include_once '../../private/init.php';
//require_admin_login();
$name = $_GET['name'] ?? '';
$sql = "SELECT * FROM products WHERE  name like '%".$name."%'";
global $db;
$products = $db->pdoQuery($sql)->aResults;

    $data = '';

    $data .= "<table class=\"table table-striped table-responsive-sm\">
    <tr>
        <td>Name</td>
        <td>Description</td>
        <td>Quantity</td>
        <td>Unit Price (GHC)</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>";

    foreach ($products as $product) {
        $data .= "<tr>
            <td>";


        $data .= $product['name'];
        $data .= "</td>
            <td>";
        $data .= $product['description'];
        $data .= "</td>
            <td>";
        $data .= $product['quantity'];
        $data .= "</td>
            <td>";
        $data .= $product['price'];
        $data .= "</td>
            <td><a href=\"editProduct.php?product_id=";
        $data .= $product['product_id'];
        $data .= "\" class=\"btn btn-outline-primary\">Update</a></td>
            <td><a href=\"deleteProduct.php?product_id=";
        $data .= $product['product_id'];
        $data .= "\" class=\"btn btn-outline-danger\">Delete</a></td>
        </tr>";
    }


    $data .= "</table>";



echo $data;

