<?php

// REVISION HISTORY


// DEVELOPER                      DATE                        COMMENTS
// Anubha Dubey(2032178)          2022-02-26                Added php common functions, company name and description
// Anubha Dubey(2032178)          2022-02-28                Updated best seller product image to appear 100%
// Anubha Dubey(2032178)          2022-02-29                Fixed error in best seller product image, added CSS for the same 
// Anubha Dubey(2032178)          2022-02-29                Added product name for bestseller 
// Anubha Dubey(2032178)          2022-03-05                Added gogle link to each product image
//


//constants 
define("FOLDER_PHP_COMMON_FUNC", "PHP-CommonFunctions/");
define("FILE_PHP_COMMON_FUNC", FOLDER_PHP_COMMON_FUNC . "commonFunctions.php");


// Including commonFunctions.php file
include_once(FILE_PHP_COMMON_FUNC);

// calling noCache() to prevent page caching 
noCache();

// calling main html body function with page name 'Home'
bodyHTML("Home");


// Shuffle Product Images
$product_images  = PRODUCT_IMAGES;
shuffle($product_images);
//print_r($product_images);
?> <!-- php tag ends here -->


<div class="company-container">
    <h1 class="company-name">🍒🫐🍓 YOGO Yogurt 🍒🫐🍓</h1>
    <h3 class="company-slogan">The yogurt for your gut... 🍒</h3>
    <p class="company-detail">Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
     Doloremque reprehenderit, <br> laboriosam totam blanditiis temporibus adipisci 
      quos voluptates corporis, cum iure, <br> obcaecati culpa et sint magni sapiente eveniet natus cupiditate perspiciatis?</p>
</div>



<?php
if($product_images[0]=="strawberry-yogo.png"){
    echo '<h3 class="bestselling-heading">🥇⭐️🏆 BESTSELLER 🏆⭐️🥇</h3>';
    echo '<a href="https://www.google.ca/" target="_blank"><img alt="yogurt-img" class="bestseller-img" src="Images/'.$product_images[0].'"/></a>';
    echo '<p class="bestselling-prod-name">🍓 Strawberry Yogurt 🍓</p>';
}
else{
    echo '<a href="https://www.google.ca/" target="_blank"><img alt="yogurt-img" class="product-img" src="Images/'.$product_images[0].'"/></a>';
}    
?>

<?php
//calling footer function
footer();
?>

