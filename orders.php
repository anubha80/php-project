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
// require 'demo.com';
?>

<?php

// REVISION HISTORY

// DEVELOPER                      DATE                        COMMENTS
// Anubha Dubey(2032178)          2022-02-26              Added php common functions, company name and description
// Anubha Dubey(2032178)          2022-02-28              Updated best seller product image to appear 100%
// Anubha Dubey(2032178)          2022-02-29              Fixed error in best seller product image, added CSS for the same 
// Anubha Dubey(2032178)          2022-02-29              Added product name for bestseller 
// Anubha Dubey(2032178)          2022-03-03              Added code to display orders in html table form
// Anubha Dubey(2032178)          2022-03-03              Fixed extra row error in table
// Anubha Dubey(2032178)          2022-03-03              Created cheat sheet button
// Anubha Dubey(2032178)          2022-03-04              Created cheat sheet download link
// Anubha Dubey(2032178)          2022-03-05              Changed column subtotal's font color based on price
// Anubha Dubey(2032178)          2022-03-06              Removed hard coded orders array length



//constants
define("FOLDER_PHP_COMMON_FUNC", "PHP-CommonFunctions/");
define("FILE_PHP_COMMON_FUNC", FOLDER_PHP_COMMON_FUNC . "commonFunctions.php");


// Including commonFunctions.php file
include_once(FILE_PHP_COMMON_FUNC);

// calling noCache() to prevent page caching 
noCache();

// calling main html body function with page name 'Orders'
bodyHTML("Orders");

// echo "<a href='Orders/cheatSheet.txt' download='Anubha-CheatSheet'>Download</a>";
echo "<div class='download-btn'><a class='cheat-sheet-link' href=".FILE_CHEAT_SHEET." download='CheatSheet_Anubha'>Cheat Sheet</a></div>";
?>


<?php
// changing body's background color to white and opacity to 0.3
// Note : ONLY changing body bg color and not the table bg color or navigation bg color
if(isset($_GET['command'])){
    $bgColor = $_GET['command'];
    if ($bgColor=="print"){
        $bgColor="white";
        $opacity=0.3;
    }
}  
else
    $bgColor = '#E3BEC6';
?>
<style type="text/css">
        body{
                background-color: <?php echo $bgColor;?>;
            }
        img{
                opacity : <?php echo  $opacity; ?>;
        }
</style>

<?php
if (filesize(FILE_ORDERS_TXT) == 0){
    echo "<h1 class='order-status'>No orders to display... ????</h1>";
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
    $fileHandle = fopen(FILE_ORDERS_TXT, "r") or die('Cannot open the file...');
    while(!feof($fileHandle)) {
        $line = fgets($fileHandle);
        $orderArr= json_decode($line);
        echo "<tr>";
        // if (empty($orderArr)) {
        //     break;
        // }
        // calculating the orders array length
        $orderArrLen=count((array)$orderArr);
        for ($i = 0; $i < $orderArrLen ; $i++) {
            if ($i==5 || $i==8 || $i==9){
                echo "<td>".$orderArr[$i]." $</td>";
            }
            else if ($i==7){
                $fontColor="#E3BEC6";
                if(isset($_GET['command'])){
                    $fontColor = $_GET['command'];
                    if ($fontColor=="color"){
                        if($orderArr[$i]<100){
                            $fontColor="red";
                        }
                        else if($orderArr[$i]>=100 && $orderArr[$i]<=999.99){
                            $fontColor="orange";
                        }
                        else {
                            $fontColor="green";
                        }
                    }
                }
                echo "<td class=$fontColor>".$orderArr[$i]." $</td>";
            }
            else{
                echo "<td>".$orderArr[$i]."</td>";
            }
        }
        echo"</tr>";
    }
    // closing file
    fclose($fileHandle);
    echo "</table>";
    echo "</div>";
    }
?>

<?php
//calling footer in the end
    footer();
?>
