<?php

//Passes data for updating an item between the client and server//
require "includes/db_defs";

#get the item variables
$id = $_GET['id'];
$name = $_GET['name'];
$description = $_GET['description'];
$category = $_GET['category'];
$vendor = $_GET['vendor'];
$start_price = $_GET['start_price'];

#update the item
$updated = update_item($id, $name, $description, $category, $vendor, $start_price);

#check the item was updated and return to the item page
if($updated) {
    header("Location: item_detail.php?id=$id");
    exit;
}

?>