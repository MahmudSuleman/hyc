<?php
include_once '../../private/init.php';
//require_admin_login();

if(isset($_GET['status'])){
    if($_GET['status'] == 'pending'){
//        if  the status is pending, the update the status to delivered...

        Purchase::delivered($_GET['id']);
        redirect_to(url_for('admin/purchases.php'));
    }else if($_GET['status'] == 'delivered'){
        Purchase::revert($_GET['id']);
        redirect_to(url_for('admin/purchases.php'));
    }
}