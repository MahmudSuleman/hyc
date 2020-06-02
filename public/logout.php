<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 4/9/2020
 * Time: 11:02 AM
 */

require_once '../private/init.php';

if(isset($_SESSION['username'])){
    session_unset();
    session_destroy();
    header("location: index.php");

}