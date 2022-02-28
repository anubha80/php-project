<?php


// Revision History


// DEVELOPER                      DATE                        COMMENTS
// Anubha Dubey(2032178)          2022-02-28                Confirmation file created showing order has been placed

//

// constants
define("FOLDER_PHP_COMMON_FUNC", "PHP-CommonFunctions/");
define("FILE_PHP_COMMON_FUNC", FOLDER_PHP_COMMON_FUNC . "commonFunctions.php");

include_once(FILE_PHP_COMMON_FUNC);

// calling noCache to prevent page caching
noCache();

TopPage("Orders Placed")
?>
<p class="order-confirmation">THANK YOU! 🎉 Your order has been placed successfully... 🍒🫐🍓</p>

<?php
footer();
?>