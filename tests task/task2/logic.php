<?php
require_once "bd_func.php";

function PostHandler($pdoDB)
{
    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
        clearMissingProducts($pdoDB);
        clearCategoryProductDB($pdoDB);
        clearEmptyStocks($pdoDB);
        header("Location: " .$_SERVER["PHP_SELF"]);
    }
}

PostHandler($pdoDB);

$categories = getAllRecords($pdoDB, "categories");
$products = getAllRecords($pdoDB, "products");
$stocks = getAllRecords($pdoDB, "stocks");
$availabilities = getAllRecords($pdoDB, "availabilities");