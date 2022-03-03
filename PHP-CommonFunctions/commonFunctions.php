<?php

// Revision History

// DEVELOPER                      DATE                        COMMENTS
// Anubha Dubey(2032178)          2022-02-26                Created top page, nav menu & footer

//

// Constants 
define("FOLDER_CSS", "CSS/");
define("FOLDER_IMAGES", "Images/");
define("FILE_INDEX", "index.php");
define("FILE_BUY", "buy.php");
define("FILE_ORDERS_PHP", "orders.php");
define("FILE_STYLES", FOLDER_CSS . "styles.css");
define("LOGO", FOLDER_IMAGES . "yogo-logo.png");
define("FOLDER_ORDERS", "Orders/");
define("FILE_ORDERS_TXT", "orders.txt");

// Function to prevent page caching
function noCache(){
    header('Expires: Sat, 01 Jan 1990 16:00:00 GMT');
    header('Cache-Control: no-store, no-cache'); 
    header('Pragma: no-cache'); 
    header('Content-type: text/html; charset=UTF-8');
}

define("PRODUCT_IMAGES",  array("cherry-yogo.png", "greek-yogo.png", "orange-yogo.png", "plain-yogo.png", "strawberry-yogo.png"));

$bestSellerProduct="strawberry-yogo.png";


// Generating HTML common code
// Page Name will go as the title of the page

function checkBestSeller(){
    echo "testing...";
}

function TopPage($pageName)
{
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $pageName; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo FILE_STYLES; ?>">
    </head>

    <body>
    <?php
    navigationMenu();
}

// function for navigation menu containing home, buy and orders page along with company's logo
function navigationMenu()
{ ?>
        <div class="container-main-nav">
            <img src="<?php echo LOGO ?>" class="logo" alt="company-logo">
            <div class="navigation">
                <a class="nav-menu" href="<?php echo FILE_ORDERS_PHP ?>">🫐ORDERS🫐</a>
                <a class="nav-menu" href="<?php echo FILE_BUY ?>">🫐BUY🫐</a>
                <a class="nav-menu" href="<?php echo FILE_INDEX ?>">🫐HOME🫐</a>    
            </div>
        </div>
    <?php
}
function footer()
{
    ?>
        <p class="copyright">Copyright® Anubha Dubey (#2032178) <?php echo date(' Y '); ?> </p>
    <?php
}
    ?>
    </body>
    </html>
