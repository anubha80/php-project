<?php

// Revision History

// DEVELOPER                      DATE                        COMMENTS
// Anubha Dubey(2032178)          2022-02-26                Added php common functions, company name and description
// Anubha Dubey(2032178)          2022-02-28                Updated best seller product image to appear 100%
// Anubha Dubey(2032178)          2022-02-29                Fixed error in best seller product image, added CSS for the same 
// Anubha Dubey(2032178)          2022-02-29                Added product name for bestseller 
// Anubha Dubey(2032178)          2022-03-03                Added code to display orders in html table form
//


//constants
define("FOLDER_PHP_COMMON_FUNC", "PHP-CommonFunctions/");
define("FILE_PHP_COMMON_FUNC", FOLDER_PHP_COMMON_FUNC . "commonFunctions.php");


// Including commonFunctions.php file
include_once(FILE_PHP_COMMON_FUNC);

// calling noCache() to prevent page caching 
noCache();

// calling top page
TopPage("Orders");
echo "<br>";
?>

<?php

// if(file_exists(FILE_ORDERS_TXT)){
//     //open file
//     $fileHandle = fopen(FILE_ORDERS_TXT, "r")
//     or die('Cannot open the file...');
//     echo "<h2 class='orders-list'>Orders List</h2>";
//     $filename = FILE_ORDERS_TXT;
//     // $filename = 'orders.txt';
//     $contents = file($filename);
//     foreach($contents as $line) {
//         echo $line . "\n";
//     }
//     fclose($fileHandle);
//     }
//     else {
//         echo "<h1 class='order-status'>No orders to display... 🐒</h1>";
//     } 
?>


<?php
if (filesize(FILE_ORDERS_TXT) == 0){
    echo "<h1 class='order-status'>No orders to display... 🐒</h1>";
}
if(file_exists(FILE_ORDERS_TXT)){
    echo "<h2 class='orders-list'>Orders List</h2>";
    echo "<div class='orders-container'>";
        echo "<table class='orders-table'>";
            echo "<tr>";
                echo "<th>Product ID</th>";
                echo "<th>First Name</th>";
                echo "<th>Last Name</th>";
                echo "<th>City</th>";
                echo "<th>Comments</th>";
                echo "<th>Price</th>";
                echo "<th>Quantity</th>";
                echo "<th>Subtotal</th>";
                echo "<th>Taxes</th>";
                echo "<th>Grand Total</th>";
            echo"</tr>";

    //opening orders.txt file
    $fileHandle = fopen(FILE_ORDERS_TXT, "r")
    or die('Cannot open the file...');
    
    while(!feof($fileHandle)) {
        $line = fgets($fileHandle);
        $orderArr= json_decode($line);
        echo "<tr>";
        for ($i = 0; $i < 10; $i++) {
            //echo $orderArr[$i]." , ";
            if ($i==5 || $i==7 || $i==8 || $i==9){
                echo "<td>".$orderArr[$i]." $</td>";
            }
            else{
                echo "<td>".$orderArr[$i]."</td>";
            }
        }
        echo"</tr>";
    }
    echo "</table>";
    echo "</div>";
    fclose($fileHandle);
    }
?>


<?php
//calling footer in the end
    footer();
?>
