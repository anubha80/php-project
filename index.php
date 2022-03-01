<?php

// Revision History


// DEVELOPER                      DATE                        COMMENTS
// Anubha Dubey(2032178)          2022-02-26                Added php common functions, company name and description
// Anubha Dubey(2032178)          2022-02-28                Updated best seller product image to appear 100%
// Anubha Dubey(2032178)          2022-02-29                Fixed error in best seller product image, added CSS for the same 
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
?> <!-- php tag ends here -->

<div class="company-container">
    <h1 class="company-name">🍒🫐🍓 YOGO Yogurt 🍒🫐🍓</h1>
    <h3 class="company-slogan">The yogurt for your gut... 🍒</h3>
    <p class="company-detail">Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
     Doloremque reprehenderit, <br> laboriosam totam blanditiis temporibus adipisci 
      quos voluptates corporis, cum iure, <br> obcaecati culpa et sint magni sapiente eveniet natus cupiditate perspiciatis?</p>
</div>


<!-- <style>
    .bestseller-img{        
    border: 5px solid red;
    width: 300px;
    padding: 2%;
    margin-top: 2%;
    margin-bottom: 4%;
    background-color: #EFDAD7;
</style> -->


<?php
if($product_images[0]=="strawberry-yogo.png"){
    echo '<img alt="yogurt-img" class="bestseller-img" src="Images/'.$product_images[0].'"/>';
}
else{
    echo '<img alt="yogurt-img" class="product-img" src="Images/'.$product_images[0].'"/>';
}    
?>

<!-- DO NOT REMOVE-->
<?php
    //echo '<img alt="yogurt-img" class="product-img" src="Images/'.$product_images[0].'"/>';
?>

<!-- // DO NOT REMOVE -->
<!-- <a href="https://www.google.ca/" target="_blank"> 
    <img src="<?php 
    // if($product_images[0]==$bestSellerProduct){
    //     echo FOLDER_IMAGES . $bestSellerProduct;
    // }
    // else{
    //     echo FOLDER_IMAGES . $product_images[0];
    // }
    
    ?>" class="product-img" alt="yogurt image"> </a> -->

<?php
footer();
?>

