<?php

require_once '../functions.php';

/**
 * Handles AJAX requests for item details.
 * Fetches the item details for the specified item ID from the database and returns it as plain text.
 * @param int $_GET['item'] The ID of the item to fetch details for.
 * @return string The item details as plain text.
 */

if (isset($_GET['item'])) {
    $item = $_GET['item'];
    echo itemDetail($item);
}

?>