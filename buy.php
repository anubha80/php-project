<?php

// Revision History


// DEVELOPER                      DATE                        COMMENTS
// Anubha Dubey(2032178)          2022-02-26                Validation of user input done
// Anubha Dubey(2032178)          2022-02-28                Fixed access error for orders.txt file
// Anubha Dubey(2032178)          2022-03-03                Fixed comment and price error


// constants 
define("FOLDER_PHP_COMMON_FUNC", "PHP-CommonFunctions/");
define("FILE_PHP_COMMON", FOLDER_PHP_COMMON_FUNC . "commonFunctions.php");

define("PRODUCT_CODE_MAX_LENGTH", 12 );
define("CUSTOMER_FIRSTNAME_MAX_LENGTH", 20 );
define("CUSTOMER_LASTNAME_MAX_LENGTH", 20 );
define("CUSTOMER_CITY_MAX_LENGTH", 8 );
define("COMMENTS_MAX_LENGTH", 200 );
define("PRICE_MAX", 10000 );
define("QUANTITY_MIN", 1 );
define("QUANTITY_MAX", 99 );
define("LOCAL_TAX", 13.45);


// including common function
include_once(FILE_PHP_COMMON);


// calling noCache() to prevent page caching
noCache();

//calling topPage function with page name Buy
TopPage("Buy");

// declaring variables for all form fields
$productCode = "";
$firstName = "";
$lastName = "";
$city = "";
$comment = "";
$price = "";
$quantity = "";

// declaring error message variables for all form fields 
$errorMsgProductCode = "";
$errorMsgFirstName = "";
$errorMsgLastName = "";
$errorMsgCity = "";
$errorMsgComment ="";
$errorMsgPrice = "";
$errorMsgQuantity = "";
$total = "";
$taxes = "";
$grandTotal = "";
$ordersArr = "";


// setting false to errorOccured initially
$errorOccured = false;

// collecting user data on submit
if (isset($_POST["submitbtn"])) {
    $productCode = htmlspecialchars($_POST["productCode"]);
    $firstName = htmlspecialchars($_POST["firstName"]);
    $lastName = htmlspecialchars($_POST["lastName"]);
    $city = htmlspecialchars($_POST["city"]);
    $comment = htmlspecialchars($_POST["comment"]);
    $price = htmlspecialchars($_POST["price"]);
    $quantity = htmlspecialchars($_POST["quantity"]);

    // validating product code
    if (mb_strlen($productCode) == 0) {
        $errorOccured = true;
        $errorMsgProductCode = "WARNING : Product code is empty";
    }
    else if (mb_strlen($productCode) > PRODUCT_CODE_MAX_LENGTH){
        $errorOccured = true;
        $errorMsgProductCode = "WARNING : Product code characters more than " . PRODUCT_CODE_MAX_LENGTH;
    } 
    else if (!($productCode[0] == 'p' || $productCode[0] == 'P')){
        $errorOccured = true;
        $errorMsgProductCode = "WARNING : Product code not starting with 'p' or 'P'";
    }
    
    // validating first name
    if (mb_strlen($firstName) == 0) {
        $errorOccured = true;
        $errorMsgFirstName = "WARNING : First name is empty";
    }
    else if (mb_strlen($firstName) > CUSTOMER_FIRSTNAME_MAX_LENGTH) {
        $errorOccured = true;
        $errorMsgFirstName = "WARNING : First name characters more than " . CUSTOMER_FIRSTNAME_MAX_LENGTH;
        
    }

    // validating last name
    if (mb_strlen($lastName) == 0) {
        $errorOccured = true;
        $errorMsgLastName = "WARNING : Last name is empty";
    }
    else if (mb_strlen($lastName) > CUSTOMER_LASTNAME_MAX_LENGTH) {
        $errorOccured = true;
        $errorMsgLastName = "WARNING : Last name characters more than " . CUSTOMER_LASTNAME_MAX_LENGTH;
    }

    // validating city name
    if (mb_strlen($city) == 0) {
        $errorOccured = true;
        $errorMsgCity = "WARNING : City name is empty";
    }
    else if (mb_strlen($city) > CUSTOMER_CITY_MAX_LENGTH) {
        $errorOccured = true;
        $errorMsgCity = "WARNING : City name characters more than " . CUSTOMER_CITY_MAX_LENGTH;
    }

    // validating comment box
    if (mb_strlen($comment) > COMMENTS_MAX_LENGTH) {
        $errorOccured = true;
        $errorMsgComment = "WARNING : Comment too large, character limit : " . COMMENTS_MAX_LENGTH;
    }

    // validating price
    if (!(is_numeric($price))) {
        $errorOccured = true;
        $errorMsgPrice = "WARNING : Price value is not numeric";
    }
    else if ($price > PRICE_MAX) {
        $errorOccured = true;
        $errorMsgPrice = "WARNING : Price higher than $" . PRICE_MAX;
    }
    else if ($price < 0) {
        $errorOccured = true;
        $errorMsgPrice = "WARNING : Price less than 0";
    }
    
    // validating quantity
    if (!(is_numeric($quantity))) {
        $errorOccured = true;
        $errorMsgQuantity = "WARNING : Quantity is not a numeric value";
    }
    else if (mb_strpos($quantity, ".") || mb_strpos($quantity, ",") ) {
        $errorOccured = true;
        $errorMsgQuantity = "WARNING : Quantity is a decimal value";
    }
    else if ($quantity < QUANTITY_MIN || $quantity > QUANTITY_MAX) {
        $errorOccured = true;
        $errorMsgQuantity = "WARNING : Quantity not in the range of " . QUANTITY_MIN . " - " . QUANTITY_MAX;
    }    

    if ($errorOccured == false) {
        $total = $price*$quantity;
        $taxes = $total*LOCAL_TAX/100;
        $grandTotal = $total + $taxes;
        $ordersArr = array($productCode, $firstName, $lastName, $city, $comment, $price, $quantity, $total, $taxes ,$grandTotal );
        
        // converting array to string
        $JSONstring = json_encode($ordersArr); 
        $ordersArr = json_decode($JSONstring);
        $ordersArr[0];
        
        // open and append into the file
        $fileHandle = fopen(FILE_ORDERS_TXT, "a") 
            or die('Cannot open the file');

        // writing into text file orders.txt
        fwrite($fileHandle, $JSONstring . "\n");
        
        // closing file handler 
        fclose($fileHandle);
        header('Location: confirmation.php');
        die();
    }
}

// product info form for user
?>
<div class="form-container">
    <h2 class="form-heading">🍓🫐🍇 Place YOGO Order 🍓🫐🍇</h2>

    <form action="buy.php" method="POST">
        <div class="field-container">
        <div class="form-field">
                <label for="" >Product Code  <span class="mandatory-field">*</span> :</label>
                <input type="text" name="productCode" id="" value="<?php echo $productCode;?>"  placeholder="Your product code...">
                <span class="validationError"><?php echo $errorMsgProductCode; ?></span>
            </div>
            <div class="form-field">
                <label for="">First Name  <span class="mandatory-field">*</span> :</label>
                <input type="text" name="firstName" id="" value="<?php echo $firstName;?>"  placeholder="Your first name...">
                <span class="validationError"><?php echo $errorMsgFirstName; ?></span>
            </div>
            <div class="form-field">
                <label for="">Last Name  <span class="mandatory-field">*</span> :</label>
                <input type="text" name="lastName" id="" value="<?php echo $lastName;?>"  placeholder="Your last name...">
                <span class="validationError"><?php echo $errorMsgLastName; ?></span>
            </div>
            <div class="form-field">
                <label for="">City  <span class="mandatory-field">*</span> :</label>
                <input type="text" name="city" id="" value="<?php echo $city;?>"  placeholder="Your city...">
                <span class="validationError"><?php echo $errorMsgCity; ?></span>
            </div>
            <div class="form-field">
                <label for="">Comments : </label>
                <textarea name="comment" class="comment-textarea" id="" cols="25" rows="5" value="<?php echo $comment;?>"  placeholder="Your comments..."></textarea>
                <span class="validationError"><?php echo $errorMsgComment; ?></span>
            </div>
            <div class="form-field">
                <label for="">Price  <span class="mandatory-field">*</span> :</label>
                <input type="text" name="price" id="" value="<?php echo $price;?>"  placeholder="Product price...">
                <span class="validationError"><?php echo $errorMsgPrice; ?></span>
            </div>
            <div class="form-field">
                <label for="">Quantity  <span class="mandatory-field">*</span> :</label>
                <input type="text" name="quantity" id="" value="<?php echo $quantity;?>"  placeholder="Product total quantity...">
                <span class="validationError"><?php echo $errorMsgQuantity; ?></span>
            </div>
        </div>
        <div class="form-buttons">
                <button class="submit-btn" type="submit" name="submitbtn" value="Save">Submit</button>
                <button class="reset-btn" type="reset" value="Clear all fields">Reset</button>
        </div>
    </form>

</div>
<?php
// calling footer function at the end of the page
footer();
?>