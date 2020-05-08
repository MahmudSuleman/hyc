<?php
ob_start();
session_start();

spl_autoload_register(function($class){include 'classes/'. $class. '.php';});
$dsn = ['host'=>'localhost', 'dbname'=>'hyc', 'username'=>'root', 'password'=>''];
$db = new PdoWrapper($dsn);
$helper = new PDOHelper($dsn);

$db->setErrorLog(true);



//regular functions definition...
//output buffering is turned on
// Assign file paths to PHP constants
// __FILE__ returns the current path to this file
// dirname() returns the path to the parent directory
define("PRIVATE_PATH", dirname(__file__));
//this returns the path to the private directoty

define("PROJECT_PATH", dirname(PRIVATE_PATH));
//this returns the path to the project directory

define("PUBLIC_PATH", PROJECT_PATH . "/public");
//this returns the path to the public directory

define("SHARED_PATH", PRIVATE_PATH . "/includes");
//this returns the path to the shared directory inside the private directory.


// Assign the root URL to a PHP constant
// * Do not need to include the domain
// * Use same document root as webserver
// * Can set a hardcoded value:
// define("WWW_ROOT", '/~kevinskoglund/globe_bank/public');
// define("WWW_ROOT", '');
// * Can dynamically find everything in URL up to "/public"

$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);
/*this function takes the script path as a arguement and check to see if it contains the leading '/' and if it can't find it, it will be added and the append it with the script name*/
function url_for($script_path) {
    // add the leading '/' if not present
    if($script_path[0] != '/') {
        $script_path = "/" . $script_path;
    }
    return WWW_ROOT . $script_path;
}


function u($string=""){return urlencode($string);}

function raw_u($string=""){return rawurlwncode($string);}

function h($string=""){return htmlspecialchars($string);}

function redirect_to($location){
    return header('Location: '.$location);
}



