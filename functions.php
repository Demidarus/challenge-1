<?php 

/**
 * Simulates a backend delay of two seconds
 */
function two_seconds_delay()
{
    sleep(2);
}

/**
 * Returns all relevant items from the database.
 * It's the "items" table from the product management system.
 * Schema is defined there.
 * @return array
 */
function getItemList(): array
{
    $dbUser = $_ENV['DB_USERNAME'];
    $dbPass = $_ENV['DB_PASSWORD'];
    
    two_seconds_delay();
    return [
        184771,
        184772,
        184773,
        184774,
        184775,
    ];
}

/**
 * Returns item details from the database.
 * It's the "items" table from the product management system.
 * Schema is defined there.
 * @return string
 */
function itemDetail($item) {
    two_seconds_delay();
    // whatever is in the database for that item
    return "Details for item $item.";
}

/**
 * Displays the items and their associated "Load details" buttons on the page.
 * Calls the validate() function on each item to ensure only valid items are displayed.
 * The item details are fetched asynchronously using the fetchItemDetails() JavaScript function
 * when the user clicks the "Load details" button.
 */
function run()
{
    if (!empty($_REQUEST['submit'])) {
        foreach(getItemList() as $i) {
            if(!validate($i)){
                continue;
            }
            ?>
<div>
    <h2><?=$i?></h2>
    <div id="details_<?=$i?>">
        <button onclick="fetchItemDetails(<?=htmlspecialchars($i)?>)">Load details</button>
    </div>
</div>
<?php
        }
    }
}

/**
 * Validates the item ID to ensure it's a valid integer between 100000 and 999999.
 * @param int $item The item ID to validate.
 * @return bool True if the item ID is valid, false otherwise.
 */
function validate($item) {
    return is_numeric($item) && $item >= 100000 && $item <= 999999;
}