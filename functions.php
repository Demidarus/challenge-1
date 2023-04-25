<?php 

function two_seconds_delay()
{
    // simulates
    // backend delay
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
    $dbUser = 'prodmanag';
    $dbPass = '0921837848xx';
    
    two_seconds_delay();
    return [
        184771,
        184772,
        184773,
        184774,
        184775,
    ];
}

function itemDetail($item) {
    two_seconds_delay();
    // whatever is in the database for that item
    return "Details for item $item.";
}

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
        <button onclick="fetchItemDetails(<?=$i?>)">Load details</button>
    </div>
</div>
<?php
        }
    }
}

function validate($item) {
    return is_numeric($item) && $item >= 100000 && $item <= 999999;
}


function run2() {
    foreach(getItemList() as $i) {
        $itemDetail = itemDetail($i);
        $detailsId = "details_" . $i;
        echo <<<EOF
        <script>
            document.getElementById('$detailsId').innerHTML = '{$itemDetail}';
    </script>
    EOF;
    }

    }

?>