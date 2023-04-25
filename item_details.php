<?php

require 'functions.php';

if (isset($_GET['item'])) {
    $item = $_GET['item'];
    echo itemDetail($item);
}

?>