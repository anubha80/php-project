<?php
// error logs
ini_set('display_errors', 1);
ini_set('log_errors',1);
ini_set('error_log',dirname(__FILE__).'/log.txt');
date_default_timezone_set('America/New_York');
$time=date('m/d/y h:iA', time());
$contents = file_get_contents('log.txt');
$contents .= "\t$time\r";
error_reporting(E_ALL);
?>

<?php

// REVISION HISTORY

// DEVELOPER                      DATE                        COMMENTS
// Anubha Dubey(2032178)          2022-02-28            Added confirmation showing order has been placed
//

// constants
define("FOLDER_PHP_COMMON_FUNC", "PHP-CommonFunctions/");
define("FILE_PHP_COMMON_FUNC", FOLDER_PHP_COMMON_FUNC . "commonFunctions.php");

include_once(FILE_PHP_COMMON_FUNC);

// calling noCache to prevent page caching
noCache();

// calling main html body function with page name 'Orders Placed'
bodyHTML("Orders Placed")
?>

<p class="order-confirmation">THANK YOU! 🎉 Your order has been placed successfully... 🍒🫐🍓</p>

<?php
footer();
?>