<?php

// Revision History


// DEVELOPER                      DATE                        COMMENTS
// Anubha Dubey(2032178)          2022-02-26                Added php common functions, company name and description

//


//constants 
define("FOLDER_PHP_COMMON_FUNC", "PHP-CommonFunctions/");
define("FILE_PHP_COMMON_FUNC", FOLDER_PHP_COMMON_FUNC . "commonFunctions.php");


// Including commonFunctions.php file
include_once(FILE_PHP_COMMON_FUNC);

// calling noCache() to prevent page caching 
noCache();

// calling top page function with page name 'Home Page'
TopPage("Home Page");

// Shuffle Product Images
$product_images  = PRODUCT_IMAGES;
shuffle($product_images);
//print_r($product_images);
?>

<div class="company-container">
    <h1 class="company-name">🍒🫐🍓 YOGO Yogurt 🍒🫐🍓</h1>
    <h3 class="company-slogan">The yogurt for your gut... 🍒</h3>
    <p class="company-detail">Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
     Doloremque reprehenderit, <br> laboriosam totam blanditiis temporibus adipisci 
      quos voluptates corporis, cum iure, <br> obcaecati culpa et sint magni sapiente eveniet natus cupiditate perspiciatis?</p>
</div>
<a href="https://www.google.ca/" target="_blank"> <img src="<?php echo FOLDER_IMAGES . $product_images[0];?>" class="product-img" alt="yogurt image"> </a>
<?php
footer();
?>